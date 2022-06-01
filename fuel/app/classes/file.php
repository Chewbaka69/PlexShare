<?php


class File extends Fuel\Core\File
{
    /**
     * To read file split by chunk
     *
     * @param   string                 $file_path    path to the file or url of the file
     * @param   int                    $speed_limit  speed limit in KB/s
     * @param   boolean                $return_bytes if you to return the totals bytes
     *
     * @return  int
     */
    public static function readChunked(string $file_path, int $speed_limit, bool $return_bytes = TRUE)
    {
        $buffer = '';
        $speed_limit += $speed_limit * 0.2;
        $tickrate = 1024;
        $cnt    = 0;

        $handle = fopen($file_path, "rb");

        if ($handle === false)
            return false;

        while (!feof($handle)) {
            $buffer = fread($handle, $speed_limit * 1024 / $tickrate);
            print $buffer;
            ob_flush();
            flush();

            if ($return_bytes) {
                $cnt += strlen($buffer);
            }

            usleep(1000000 / $tickrate);
        }
        $status = fclose($handle);

        if ($return_bytes && $status) {
            return $cnt; // return num. bytes delivered like readfile() does.
        }

        return $status;
    }
}