<?php

namespace App\Module\Tpl;


class Role extends BaseTpl
{
    public static $tpl = [
        'id' => [
            'key' => 'id',
            'name' => '自增ID',
            'type' => 'text',
            'require' => false,
            'readonly' => true,
            'value' => '',
        ],
        'is_admin' => [
            'key' => 'is_admin',
            'name' => '是否管理员',
            'type' => 'select',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'name' => [
            'key' => 'name',
            'name' => '角色名称',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'desc' => [
            'key' => 'desc',
            'name' => '角色说明',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'menu_json' => [
            'key' => 'menu_json',
            'name' => '角色分配的菜单',
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
        'is_admin' =>  [
             0 => '否',
             1 => '是',
         ],
        'status' =>  [
             1 => '正常',
             0 => '失效',
         ],
    ];

    public static $header = [
        'id',
        'is_admin',
        'name',
        'desc',
        'menu_json',
        'status',
        'create_time',
        'update_time',
    ];

    public static $query = [
//        'id',
//        'is_admin',
//        'name',
//        'desc',
//        'menu_json',

    ];

    public static $buttons = [
        [
            'type' => 'page',
            'name' => '查看',
            'url' => "/role/show/{id}"
        ],
        [
            'type' => 'page',
            'name' => '更新',
            'url' => "/role/update/{id}"
        ],
        [
            'type' => 'ajax',
            'name' => '删除',
            'url' => "/ajax/role/delete/{id}"
        ]
    ];

    //数据更新接口
    public static $updateUrl = '/ajax/role/update';
    //数据添加接口
    public static $addUrl = '/ajax/role/add';
}
