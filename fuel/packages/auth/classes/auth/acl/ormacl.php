<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

namespace Auth;

/**
 * OrmAuth ORM driven acl driver
 *
 * @package     Fuel
 * @subpackage  Auth
 */
class Auth_Acl_Ormacl extends \Auth_Acl_Driver
{
	/*
	 * @var  array  list of valid roles
	 */
	protected static $_valid_roles = array();

	/*
	 * class init
	 */
	public static function _init()
	{
		// get the list of valid roles
		try
		{
			static::$_valid_roles = \Cache::get(\Config::get('ormauth.cache_prefix', 'auth').'.roles');
		}
		catch (\CacheNotFoundException $e)
		{
			static::$_valid_roles = \Model\Auth_Role::find('all');
			\Cache::set(\Config::get('ormauth.cache_prefix', 'auth').'.roles', static::$_valid_roles);
		}
	}

	/*
	 * @var  array  cached user ACLs
	 */
	protected $_acl_cache = array();

	/*
	 * Return the list of defined roles
	 */
	public function roles()
	{
		return static::$_valid_roles;
	}

	/*
	 * Check if the user has the required permissions
	 */
	public function has_access($condition, Array $entity)
	{
		// get the group driver instance
		$group_driver = \Auth::group($entity[0]);

		// parse the requested permissions so we can check them
		$condition = static::_parse_conditions($condition);

		// if we couldn't parse the conditions, don't have a driver, or the driver doesn't export roles, bail out
		if ( ! is_array($condition) || empty($group_driver) || ! is_callable(array($group_driver, 'get_roles')))
		{
			return false;
		}

		// get the permission area and the permission rights to be checked
		$area = $condition[0];

		// any actions defined?
		if ( ! is_array($condition[1]) and preg_match('#(.*)?\[(.*)?\]#', $condition[1], $matches))
		{
			$rights = (array) $matches[1];
			$actions = explode(',', $matches[2]);
		}
		else
		{
			$rights  = (array) $condition[1];
			$actions = array();
		}

		// fetch the current user object
		$user = Auth::get_user();

		// some storage to collect the current rights and revoked rights, and the global flag
		$current_rights = array();
		$revoked_rights = array();
		$global_access = null;

		// assemble the current users effective rights
		$cache_key = \Config::get('ormauth.cache_prefix', 'auth').'.permissions.user_'.($user ? $user->id : 0);
		try
		{
			// cache in memory to avoid multiple cache hits for the same cache key
			if ( ! isset($this->_acl_cache[$cache_key]))
			{
				$this->_acl_cache[$cache_key] = \Cache::get($cache_key);
			}
			list($current_rights, $revoked_rights, $global_access) = $this->_acl_cache[$cache_key];
		}
		catch (\CacheNotFoundException $e)
		{
			// get the role objects assigned to this group
			$current_roles  = $entity[1]->roles;

			// if we have a user, add the roles directly assigned to the user
			if ($user)
			{
				$current_roles = \Arr::merge($current_roles, Auth::get_user()->roles);
			}

			foreach ($current_roles as $role)
			{
				// role grants all access
				if ($role->filter == 'A')
				{
					$global_access = true;
				}

				// role denies all access
				elseif ($role->filter == 'D')
				{
					$global_access = false;
				}

				// role defines a permission revocation
				elseif ($role->filter == 'R')
				{
					// fetch the permissions of this role
					foreach ($role->permissions as $permission)
					{
						isset($revoked_rights[$permission->area][$permission->permission]) or $revoked_rights[$permission->area][$permission->permission] = array();
						foreach ($role->rolepermission as $rolepermission)
						{
							if ($rolepermission->role_id == $role->id and $rolepermission->perms_id == $permission->id)
							{
								$revoked_rights[$permission->area][$permission->permission] = array_merge(
									$revoked_rights[$permission->area][$permission->permission],
									array_intersect_key(
										$permission->actions ?: array(),
										array_flip($rolepermission->actions ?: array())
									)
								);
								break;
							}
						}
					}
				}

				// standard role, add it to the current rights set
				else
				{
					// fetch the permissions of this role
					foreach ($role->permissions as $permission)
					{
						isset($current_rights[$permission->area][$permission->permission]) or $current_rights[$permission->area][$permission->permission] = array();
						foreach ($role->rolepermission as $rolepermission)
						{
							if ($rolepermission->role_id == $role->id and $rolepermission->perms_id == $permission->id)
							{
								$current_rights[$permission->area][$permission->permission] = array_merge(
									$current_rights[$permission->area][$permission->permission],
									array_intersect_key(
										$permission->actions ?: array(),
										array_flip($rolepermission->actions ?: array())
									)
								);
								break;
							}
						}
					}
				}
			}

			// if this user doesn't have a global filter applied...
			if (is_array($current_rights))
			{
				if ($user)
				{
					// add the users group rights
					foreach ($user->group->permissions as $permission)
					{
						isset($current_rights[$permission->area][$permission->permission]) or $current_rights[$permission->area][$permission->permission] = array();
						foreach ($user->group->grouppermission as $grouppermission)
						{
							if ($grouppermission->group_id == $user->group_id and $grouppermission->perms_id == $permission->id)
							{
								$current_rights[$permission->area][$permission->permission] = array_merge(
									$current_rights[$permission->area][$permission->permission],
									array_intersect_key(
										$permission->actions ?: array(),
										array_flip($grouppermission->actions ?: array())
									)
								);
								break;
							}
						}
					}

					// add the users personal rights
					foreach ($user->permissions as $permission)
					{
						isset($current_rights[$permission->area][$permission->permission]) or $current_rights[$permission->area][$permission->permission] = array();
						foreach ($user->userpermission as $userpermission)
						{
							if ($userpermission->user_id == $user->id and $userpermission->perms_id == $permission->id)
							{
								$current_rights[$permission->area][$permission->permission] = array_merge(
									$current_rights[$permission->area][$permission->permission],
									array_intersect_key(
										$permission->actions ?: array(),
										array_flip($userpermission->actions ?: array())
									)
								);
								break;
							}
						}
					}
				}
			}

			// save the rights in the cache
			$this->_acl_cache[$cache_key] = array($current_rights, $revoked_rights, $global_access);
			\Cache::set($cache_key, $this->_acl_cache[$cache_key]);
		}

		// check for a revocation first
		foreach ($rights as $right)
		{
			// check revocation permissions
			if ( isset($revoked_rights[$area]) and array_key_exists($right, $revoked_rights[$area]))
			{
				$revoked = true;

				// need to check any actions?
				foreach ($actions as $action)
				{
					if ( ! in_array($action, $revoked_rights[$area][$right]))
					{
						$revoked = false;
						break;
					}
				}

				// right revoked?
				if ($revoked)
				{
					return false;
				}
			}
		}

		// was a global filter applied?
		if (is_bool($global_access))
		{
			// we're done here
			return $global_access;
		}

		// start checking rights, terminate false when right not found
		foreach ($rights as $right)
		{
			// check basic permissions
			if ( ! isset($current_rights[$area]) or ! array_key_exists($right, $current_rights[$area]))
			{
				return false;
			}

			// need to check any actions?
			foreach ($actions as $action)
			{
				if ( ! in_array($action, $current_rights[$area][$right]))
				{
					return false;
				}
			}
		}

		// all necessary rights were found, return true
		return true;
	}
}
