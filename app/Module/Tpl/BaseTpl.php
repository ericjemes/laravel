<?php

namespace App\Module\Tpl;


class BaseTpl
{

    /**
     * 初始化数据 及选项
     * @author gaojian291
     * @date 2018-06-04
     * @param array $param option value值 [
     *      'id' => 1001,
     *      'name' => 'demo'
     * ]
     * @param array $default option 通用tpl处理 [
     *      'parent_id' => [
     *          'key' => 'parent_id',
     *          'name' => '父菜单ID',
     *          'type' => 'text',
     *          'require' => false,
     *          'readonly' => false,
     *          'value' => '',
     *          'select' => [],
     *      ],
     * ]
     * @return array
     */
    public static function getTpl($param = [], $default = [])
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
        if ($default) {
            foreach ($default as $key => $val) {
                if (isset($self::$tpl[$key])) {
                    $self::$tpl[$key] = array_merge($self::$tpl[$key], $val);
                }
            }
        }
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
