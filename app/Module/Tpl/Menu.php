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
            'readonly' => true,
            'value' => '',
        ],
        'name' => [
            'key' => 'name',
            'name' => '菜单名称',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
        ],
        'parent_id' => [
            'key' => 'parent_id',
            'name' => '父级菜单',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
        ],
        'url' => [
            'key' => 'url',
            'name' => '菜单地址',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'key' => [
            'key' => 'key',
            'name' => '菜单唯一key',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'type' => array(
            'key' => 'type',
            'name' => '菜单类型',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ),
        'icon' => [
            'key' => 'icon',
            'name' => '图标',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'status' => [
            'key' => 'status',
            'name' => '数据状态',
            'type' => 'select',
            'require' => false,
            'readonly' => true,
            'value' => '',
            'list' => [],
        ],
        'create_time' => [
            'key' => 'create_time',
            'name' => '创建时间',
            'type' => 'text',
            'require' => false,
            'readonly' => true,
            'value' => '',
        ],
        'update_time' => [
            'key' => 'update_time',
            'name' => '更新时间',
            'type' => 'text',
            'require' => false,
            'readonly' => true,
            'value' => '',
        ],
    ];

    public static $map = [
        'type' =>  [
            0 => '菜单',
            1 => '权限',
            2 => '资源',
        ],
        'status'=>[
            1 => '正常',
            0 => '失效'
        ]
    ];

    public static $header = [
        'id',
        'name',
        'parent_id',
        'url',
        'type',
        'create_time',
        'update_time',
    ];


    public static $query = [
        'id',
        'name',
        'parent_id',
        'type'
    ];


    public static $buttons = [
        [
            'type' => 'page',
            'name' => '查看',
            'url' => "/menu/show/{id}"
        ],
        [
            'type' => 'page',
            'name' => '更新',
            'url' => "/menu/update/{id}"
        ],
        [
            'type' => 'ajax',
            'name' => '删除',
            'url' => "/ajax/menu/delete/{id}"
        ]
    ];

    //数据更新接口
    public static $updateUrl = '/ajax/menu/update';
    //数据添加接口
    public static $addUrl = '/ajax/menu/add';
}
