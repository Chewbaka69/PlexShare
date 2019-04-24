<?php

use Fuel\Core\Controller_Rest;
use Fuel\Core\FuelException;
use Fuel\Core\Input;

class Controller_Rest_Library extends Controller_Rest
{
    public function post_permission()
    {
        try {
            $library_id = Input::post('library_id');
            $right_name = Input::post('right_name');
            $checked = Input::post('checked');
            $parameter = Input::post('parameter');

            if ($library_id === null || $right_name === null || $checked === null)
                throw new FuelException('Missing parameters');

            $permission = Model_Permission::find_one_by('name', $right_name);

            $permission_id = $permission->id;

            $library_permission = Model_Library_Permission::find_one_by(function ($query) use ($library_id, $permission_id) {
                $query
                    ->where('library_id', $library_id)
                    ->and_where('permission_id', $permission_id);
            });


            if ($library_permission === null) {
                $library_permission = new Model_Library_Permission();
                $library_permission->library_id = $library_id;
                $library_permission->permission_id = $permission_id;
            }

            if ($checked === 'false')
                $library_permission->disable = true;
            else
                $library_permission->disable = false;

            if($parameter !== null)
                $library_permission->value = $parameter;

            $library_permission->save();

            return $this->response(['error' => false, 'message' => 'Permission modify successfully']);
        } catch (Exception $exception) {
            return $this->response(['error' => true, 'message' => $exception->getMessage()]);
        }
    }
}