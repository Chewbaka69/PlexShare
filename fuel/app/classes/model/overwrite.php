<?php

use Fuel\Core\DB;
use Fuel\Core\Model_Crud;
use Fuel\Core\Str;

abstract class Model_Overwrite extends Model_Crud
{
    protected static function disable()
    {
        return isset(static::$_disable) ? 'disabled' : null;
    }

    public function delete()
    {
        static::disable() ? $query = DB::update(static::$_table_name)
            ->value('disable', 1)
            ->where(static::primary_key(), '=', $this->{static::primary_key()}) : null;

        $this->pre_delete($query);
        $result = $query ? $query->execute(static::get_connection(true)) : null;

        return $this->post_delete($result);
    }

    protected function pre_save(&$query)
    {
        if($this->is_new()) {
            if(!isset($this->{static::primary_key()}) || !$this->{static::primary_key()} || $this->{static::primary_key()} === null) {
                $this->{static::primary_key()} =  Str::random('uuid');
                $query->set([static::primary_key() => $this->{static::primary_key()}]);
            }
        }
    }

}