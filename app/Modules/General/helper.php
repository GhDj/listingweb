<?php

if (!function_exists('checkApiToken')) {
    /**
     * @param string $token
     * @return bool
     */
    function checkApiToken($token)
    {
      //dd(encryptAES('Olymiade+Sports+Web/dKd72$XMEH39_+@=j6wzn?t*8783JH5dsfsfsDKodpkTb#Dp=N5SnRJKg3?T2MTz^L@&@3kSg2nPbS2qxx@!VBUg$C!!t=nwG7EuJXpqy5$vp2tBT9vmpf'));
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