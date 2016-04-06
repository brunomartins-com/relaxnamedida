<?php

namespace App\Helpers;

use Exception;

class JsonResources
{

    /**
     * @param $filename
     * @return bool
     */
    public static function hasFile($filename)
    {
        $filename = database_path('resources') . DIRECTORY_SEPARATOR . $filename . '.json';
        return is_file($filename);
    }

    /**
     * @param $filename
     * @throws Exception
     * @return array
     */
    public static function readFile($filename)
    {
        try {
            $filename = database_path('resources') . DIRECTORY_SEPARATOR . $filename . '.json';
            $content  = file_get_contents($filename);
        } catch (Exception $e) {
            throw new Exception("Error open file: {$e->getMessage()}");
        }
        return json_decode($content, true);
    }

    /**
     * @param $file
     * @param $content
     * @throws Exception
     */
    public static function writeFile($filename, $content)
    {
        $filename = database_path('resources') . DIRECTORY_SEPARATOR . $filename . '.json';
        try {
            if (file_exists($filename)) {
                unlink($filename);
            }

            $fh = fopen($filename, 'w+');
            fwrite($fh, $content);
            fclose($fh);

        } catch (Exception $e) {
            throw new Exception("Error open file: {$e->getMessage()}");
        }
    }
}
