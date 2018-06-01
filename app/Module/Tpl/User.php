<?php

namespace App\Module\Tpl;


class User extends BaseTpl
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
        'name' => [
            'key' => 'name',
            'name' => '用户名称',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'mobile' => [
            'key' => 'mobile',
            'name' => '用户手机号',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'email' => [
            'key' => 'email',
            'name' => '邮件地址',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'password' => [
            'key' => 'password',
            'name' => '用户密码',
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
        'role' => [
            'key' => 'role',
            'name' => '用户拥有的角色',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'description' => [
            'key' => 'description',
            'name' => '个人描述',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'address' => [
            'key' => 'address',
            'name' => '地址信息',
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
        'name',
        'mobile',
        'email',
        'password',
        'type',
        'role',
        'description',
        'address',
        'status',
        'create_time',
        'update_time',
    ];

    public static $query = [
        'id',
        'name',
        'mobile',
        'email',
        'password',
        'type',
        'role',
        'description',
        'address',
        'status',
        'create_time',
        'update_time',
    ];

    public static $buttons = [
        [
            'type' => 'page',
            'name' => '查看',
            'url' => "/user/show/{id}"
        ],
        [
            'type' => 'page',
            'name' => '更新',
            'url' => "/user/update/{id}"
        ],
        [
            'type' => 'ajax',
            'name' => '删除',
            'url' => "/ajax/user/delete/{id}"
        ]
    ];

    //数据更新接口
    public static $updateUrl = '/ajax/user/update';
    //数据添加接口
    public static $addUrl = '/ajax/user/add';
}
