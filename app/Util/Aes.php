<?php namespace App\Util;

    /**
     * AES加密解密算法
     * @package \App\Util
     * @author gaojian291
     * @date 2017-06-21
     */
class Aes
{
    /**
     * 算法,另外还有192和256两种长度
     */
    const CIPHER = MCRYPT_RIJNDAEL_128;

    /**
     * 模式
     */
    const MODE = MCRYPT_MODE_ECB;

    const SIGN_KEY = '2EBEF708E6EA9A44D0D44CF7D6997253';                        //加密key


    /**
     * AES加密.
     * @author gaojian291
     * @date 2017-06-21
     * @param string $str require 需加密的字符串
     * @param string $key option 密钥
     * @return array
     */
    public static function encode($str, $key = self::SIGN_KEY)
    {
        $size = mcrypt_get_iv_size(self::CIPHER, self::MODE);
        $iv = mcrypt_create_iv($size, MCRYPT_RAND);
        $string = mcrypt_encrypt(self::CIPHER, $key, $str, self::MODE, $iv);
        $string = base64_encode($string);
        return $string;
    }


    /**
     * AES加密.
     * @author gaojian291
     * @date 2017-06-21
     * @param string $str require 需加密的字符串
     * @param string $key option 密钥
     * @return array
     */
    public static function decode($str, $key = self::SIGN_KEY)
    {
        $str = str_replace(' ', '+' ,$str);
        $size = mcrypt_get_iv_size(self::CIPHER, self::MODE);
        $iv = mcrypt_create_iv($size, MCRYPT_RAND);
        $string = base64_decode($str);
        $string = mcrypt_decrypt(self::CIPHER, $key, $string, self::MODE, $iv);
        $string = trim($string);
        return $string;
    }


    public static function token($str)
    {
        return md5($str . microtime(true). mt_rand(1, 1000));
    }


    public static function strMD5($str)
    {
        return md5($str);
    }
}
