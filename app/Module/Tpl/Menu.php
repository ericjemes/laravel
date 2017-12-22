<?php

namespace App\Module\Tpl;


class Menu extends BaseTpl
{
    public static $tpl = [
        'id' => [
            'key' => 'id',
            'name' => '菜单ID',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'name' => [
            'key' => 'name',
            'name' => '菜单名称',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'parent_id' => [
            'key' => 'parent_id',
            'name' => '父级菜单',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'url' => [
            'key' => 'url',
            'name' => '菜单地址',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'key' => [
            'key' => 'key',
            'name' => '菜单唯一key',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'type' => [
            'key' => 'type',
            'name' => '菜单类型',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                ''=>'请选择',
                0 => '菜单',
                1 => '权限',
                2 => '资源',
            ],
        ],
        'status' => [
            'key' => 'status',
            'name' => '数据状态',
            'type' => 'select',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [
                ''=>'请选择',
                1 => '正常',
                0 => '失效'
            ],
        ],
        'icon' => [
            'key' => 'icon',
            'name' => '图标',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
    ];

    public static $map = [
        'type' =>  [
            0 => '菜单',
            1 => '权限'
        ],
        'status'=>[
            1 => '正常',
            0 => '失效'
        ]
    ];

    /**
     * 获取tpl模板
     * @author gaojian291
     * @date 2017-05-18
     * @param array $rules required [                   //选择的模板
     *      'id'    =>['require'=>true,type=>'text'],
     *      'name'  =>['require'=>true,type=>'text'],
     * ]
     * @param array $data option description [          //默认value值
     *      'id'=>'10001',
     *      'name'=>'jemes',
     * ]
     * @return array
     */
    public static function getTpl($rules = [], $data = [])
    {
        $returnTpl = [];
        if (empty($rules)) {
            $returnTpl = static::$tpl;
        } else {
            foreach ($rules as $key=>$val) {
                if (isset(static::$tpl[$key])) {
                    $returnTpl[$key] = static::$tpl[$key];
                    $returnTpl[$key] = array_merge($returnTpl[$key], $val);
                }
            }
        }

        foreach ($data as $key=>$val) {
            if (isset($returnTpl[$key])) {
                $returnTpl[$key]['value'] = $val;
            }
        }
        return $returnTpl;
    }

    public static function getMap()
    {
        return self::$map;
    }

}
