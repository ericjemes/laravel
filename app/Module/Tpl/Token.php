<?php

namespace App\Module\Tpl;


class Token extends BaseTpl
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
        'user_id' => [
            'key' => 'user_id',
            'name' => '用户ID',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'token' => [
            'key' => 'token',
            'name' => '登录token',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'type' => [
            'key' => 'type',
            'name' => '用户类型',
            'type' => 'select',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
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
             0 => '默认',
             1 => '微信',
         ],
        'status' =>  [
             1 => '正常',
             0 => '失效',
         ],
    ];

    public static $header = [
        'id',
        'user_id',
        'token',
        'type',
        'status',
        'create_time',
        'update_time',
    ];

    public static $query = [
        'id',
        'user_id',
        'token',
        'type',
        'status',
        'create_time',
        'update_time',
    ];

    public static $buttons = [
        [
            'type' => 'page',
            'name' => '查看',
            'url' => "/token/show/{id}"
        ],
        [
            'type' => 'page',
            'name' => '更新',
            'url' => "/token/update/{id}"
        ],
        [
            'type' => 'ajax',
            'name' => '删除',
            'url' => "/ajax/token/delete/{id}"
        ]
    ];

    //数据更新接口
    public static $updateUrl = '/ajax/token/update';
    //数据添加接口
    public static $addUrl = '/ajax/token/add';
}
