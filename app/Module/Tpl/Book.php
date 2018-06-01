<?php

namespace App\Module\Tpl;


class Book extends BaseTpl
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
        'title' => [
            'key' => 'title',
            'name' => '书名',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'desc' => [
            'key' => 'desc',
            'name' => '描述',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'author' => [
            'key' => 'author',
            'name' => '作者',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'cover' => [
            'key' => 'cover',
            'name' => '封面',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'price' => [
            'key' => 'price',
            'name' => '价格 单位:分',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'publisher' => [
            'key' => 'publisher',
            'name' => '出版社',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'size' => [
            'key' => 'size',
            'name' => '书的大小',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
        ],
        'type' => [
            'key' => 'type',
            'name' => '书的类型',
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
             1 => '小说',
             2 => '传记',
         ],
        'status' =>  [
             1 => '正常',
             0 => '失效',
         ],
    ];

    public static $header = [
        'id',
        'title',
        'desc',
        'author',
        'cover',
        'price',
        'publisher',
        'size',
        'type',
        'status',
        'create_time',
        'update_time',
    ];

    public static $query = [
        'id',
        'title',
        'desc',
        'author',
        'cover',
        'price',
        'publisher',
        'size',
        'type',
        'status',
        'create_time',
        'update_time',
    ];

    public static $buttons = [
        [
            'type' => 'page',
            'name' => '查看',
            'url' => "/book/show/{id}"
        ],
        [
            'type' => 'page',
            'name' => '更新',
            'url' => "/book/update/{id}"
        ],
        [
            'type' => 'ajax',
            'name' => '删除',
            'url' => "/ajax/book/delete/{id}"
        ]
    ];

    //数据更新接口
    public static $updateUrl = '/ajax/book/update';
    //数据添加接口
    public static $addUrl = '/ajax/book/add';
}
