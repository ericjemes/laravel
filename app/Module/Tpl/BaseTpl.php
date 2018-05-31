<?php

namespace App\Module\Tpl;


class BaseTpl
{
    public static function getTpl($param = [])
    {
        $self = new static;
        $self::$tpl = array_map(function($val) use ($param) {
            if ($val['type'] == 'select') {
                $val['list'] = isset(static::$map[$val['key']]) ? static::$map[$val['key']] : [];
            }
            if (isset($param[$val['key']])) {
                $val['value'] = $param[$val['key']];
            }
            return $val;
        }, $self::$tpl);
        return $self;
    }


    public static function query()
    {
        return array_filter(static::$tpl, function ($val) {
            return in_array($val['key'], static::$query);
        });
    }


    public static function head()
    {
        return array_map(function ($val) {
            if (isset(static::$tpl[$val])) {
                return static::$tpl[$val]['name'];
            }
        }, static::$header);
    }

    public static function data()
    {
        return static::$tpl;
    }
}
