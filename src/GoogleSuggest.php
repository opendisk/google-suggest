<?php

namespace Opendisk\WebScraper;

class GoogleSuggest
{
    public static function get($keyword='', $lang='', $country='', $proxy='')
    {
        $url = 'http://suggestqueries.google.com/complete/search?';

        $query = [
            'client' => 'chrome',
            'q' => $keyword,
        ];

        if(!empty($lang)){
            $query['hl'] = $lang;
        }

        if(!empty($country)){
            $query['gl'] = $country;
        }

        $url .= http_build_query($query);
        
        if (!function_exists('curl_version')) {
            die('cURL extension is disabled on your server!');
        }
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);    
        if(isset($_SERVER['HTTP_USER_AGENT'])){
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if (!empty($proxy)) {
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
        }
        $result = curl_exec($ch);
        curl_close($ch);

        $output = json_decode($result, true);

        return $output[1];
    }
}
