<?php

namespace App\Utils;

//use lyracom\Lyra\Client;

class IzipayUtil {

    public static function set_credentials()
    {   
        \Lyra\Client::setDefaultUsername(env('IZIPAY_USERNAME'));
        \Lyra\Client::setDefaultPassword(env('IZIPAY_PASSWORD'));
        \Lyra\Client::setDefaultEndpoint(env('IZIPAY_ENDPOINT'));
        \Lyra\Client::setDefaultPublicKey(env('IZIPAY_PUBLICKEY'));
        \Lyra\Client::setDefaultSHA256Key(env('IZIPAY_SHA256'));
        return;
    }
}
