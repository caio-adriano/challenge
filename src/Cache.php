<?php

abstract class MyCache
{


    public static function saveCache($url, $data)
    {
        $url = parse_url($url);
        $filepath = __DIR__ . '/../file_cache/' . $url['host'] . '/';
        $filename = pathinfo($url['path'], PATHINFO_FILENAME).'.json';

        @mkdir($filepath);
        file_put_contents($filepath . $filename, $data);

        $_SESSION['cache'][$url['host']]['time'] = (new DateTime())->format('Y-m-d h:i:s');

        return $data;
    }

    public static function getCachedData($url)
    {
        $url = parse_url($url);
        $filepath = __DIR__ . '/../file_cache/' . $url['host'] . '/';
        $filename = pathinfo($url['path'], PATHINFO_FILENAME) . '.json';


        $lastcache = new DateTime($_SESSION['cache'][$url['host']]['time']);
        $currentDateTime = new DateTime();

        if ($currentDateTime->diff($lastcache)->i > 1) {
            return null;
        } else {
            return file_get_contents($filepath . $filename);
        }
    }
}