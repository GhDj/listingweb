<?php

if (!function_exists('checkApiToken')) {
    /**
     * @param string $token
     * @return bool
     */
    function checkApiToken($token)
    {
        if(decryptAES(config('api.SHA256Token')) === decryptAES($token)){
            return true;
        }
        return false;
    }
}

if (!function_exists('decryptAES')) {
    /**
     * @param string $string
     * @return string
     */
    function decryptAES($string)
    {
        return openssl_decrypt(base64_decode($string), config('app.cipher'), config('api.encryptKey'), 0, config('api.encryptString'));
    }
}

if (!function_exists('encryptAES')) {
    /**
     * @param string $string
     * @return string
     */
    function encryptAES($string)
    {
        return base64_encode(openssl_encrypt($string, config('app.cipher'), config('api.encryptKey'), 0, config('api.encryptString')));
    }
}

if (!function_exists('transform64BitPicture')) {
    /**
     * @param string $base64
     * @return string
     */
    function transform64BitPicture($base64)
    {
        return base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
    }
}

