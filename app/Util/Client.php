<?php namespace App\Util;

/**
 * 获取用户客户端信息工具类
 *
 * Class Client
 * @package App\Util
 */
class Client
{
    /**
     * 获取客户端IP
     *
     * @author zhengjianbing013
     * @date 2016-10-12
     * @return mixed IP地址
     */
    public static function getClientIP()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $sIP = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $aIPs = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $sIP = array_shift($aIPs);
        } else {
            $sIP = $_SERVER['REMOTE_ADDR'];
        }
        return $sIP;
    }

    /**
     * 获取用户的clientID
     *
     * @author zhengjianbing013
     * @date 2016-10-12
     * @return string $sClientID 客户端ID
     */
    public static function getClientID()
    {
        $sClientID = self::getDeviceID();
        if (empty($sClientID)) {
            $sClientID = self::createGuid();
        }
        return $sClientID;
    }

    /**
     * 获取设备ID
     *
     * @author zhengjianbing013
     * @date 2016-10-12
     * @return string $sDeviceID 客户端设备ID
     */
    public static function getDeviceID()
    {
        $sDeviceID = "";
        if (isset($_SERVER['HTTP_APP_DEVICEID']) && !empty($_SERVER['HTTP_APP_DEVICEID'])) {
            $sDeviceID = $_SERVER['HTTP_APP_DEVICEID'];
        }
        return $sDeviceID;
    }

    /**
     * 生成GUID
     *
     * @author zhengjianbing013
     * @date 2016-10-12
     * @return string $uuid 唯一ID
     */
    public static function createGuid()
    {
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $uuid = substr($charid, 0, 8) . chr(45)
            . substr($charid, 8, 4) . chr(45)
            . substr($charid, 12, 4) . chr(45)
            . substr($charid, 16, 4) . chr(45)
            . substr($charid, 20, 12);
        return $uuid;
    }
}
