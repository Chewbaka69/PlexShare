<?php

class Model_Permission extends Model_Overwrite
{
    /**
     * RIGHT_WATCH_DISABLED
     * RIGHT_DOWNLOAD_DISABLED
     * RIGHT_MAX_DOWNLOAD
     * RIGHT_MAX_WATCH
     * RIGHT_MAX_QUALITY
     * RIGHT_MAX_CONCURRENT_STREAM
     */

    protected static $_table_name = 'permission';
    protected static $_primary_key = 'id';
    protected static $_properties = array(
        'id',
        'name',
        'disable'
    );

    /**
     * @param string $permission
     * @param Model_Movie $movie
     * @return bool
     */
    public static function isGranted($permission, Model_Movie $movie)
    {
        if ($movie === null)
            return false;

        $library = $movie->getLibrary();

        if ($library === null)
            return false;

        $permission = Model_Permission::find_one_by('name', $permission);

        if ($permission === null)
            return true;

        $library_permission = Model_Library_Permission::find_one_by([
            ['library_id', '=', $library->id],
            ['permission_id', '=', $permission->id],
            ['disable', '=', 0]
        ]);

        if ($library_permission === null)
            return true;

        if ($permission->name === 'RIGHT_WATCH_DISABLED')
            return false;

        if ($permission->name === 'RIGHT_DOWNLOAD_DISABLED')
            return false;

        if ($permission->name === 'RIGHT_MAX_DOWNLOAD') {
            /** @TODO IF (NUMBER_DOWNLOAD <= MAX_DOWNLOAD)
             *  RETURN TRUE
             *  ELSE
             *  RETURN FALSE
             */
            return true;
        }

        if ($permission->name === 'RIGHT_MAX_WATCH') {
            /** @TODO IF (NUMBER_WATCH <= MAX_WATCH)
             *  RETURN TRUE
             *  ELSE
             *  RETURN FALSE
             */
            return true;
        }

        if ($permission->name === 'RIGHT_MAX_QUALITY') {
            /** @TODO IF (VIDEO SETTINGS QUALITY <= MAX_QUALITY)
             *  RETURN TRUE
             *  ELSE
             *  RETURN FALSE
             */
            return true;
        }

        if ($permission->name === 'RIGHT_MAX_CONCURRENT_STREAM') {
            /** @TODO IF (VIDEO SETTINGS QUALITY <= MAX_QUALITY)
             *  RETURN TRUE
             *  ELSE
             *  RETURN FALSE
             */
            return true;
        }
    }
}