<?php

namespace App\Http\Controllers;

abstract class Controller
{
    function getYouTubeCode($url) {
        $code = null;

        // Jika short link youtu.be
        if (strpos($url, 'youtu.be') !== false) {
            $parts = explode('/', $url);
            $code = end($parts);
            // Hapus query string jika ada
            $code = explode('?', $code)[0];
        }
        // Jika full link youtube.com/watch?v=...
        elseif (strpos($url, 'youtube.com') !== false) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            if (isset($query['v'])) {
                $code = $query['v'];
            }
        }

        return $code;
    }
}
