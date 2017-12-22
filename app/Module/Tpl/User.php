<?php

namespace App\Module\Tpl;


class User extends BaseTpl
{
    public static $tpl = [
        'id' => [
            'key' => 'id',
            'name' => '用户ID',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'name' => [
            'key' => 'name',
            'name' => '用户名称',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'mobile' => [
            'key' => 'mobile',
            'name' => '用户手机',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'email' => [
            'key' => 'email',
            'name' => '用户邮箱',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'password' => [
            'key' => 'password',
            'name' => '用户密码',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'type' => [
            'key' => 'type',
            'name' => '用户类型',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                '' => '请选择',
                0 => '默认',
                1 => '微信'
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
                '' => '请选择',
                1 => '正常',
                0 => '失效'
            ],
        ],
    ];

    //user页面配置信息
    public static $config = [
        'user_list' => [
            'select_menu' => 'user_list',
            'head' => [
                'id' => '用户id',
                'name' => '用户名称',
                'mobile' => '用户手机号',
                'email' => '用户邮箱',
                'type' => '用户类型',
                'create_time' => '创建时间',
                'update_time' => '更新时间',
                'buttons' => '操作'
            ],
            'map' => [
                'type'   => [0 => '默认', 1 => '微信'],
                'status' => [1 => '正常', 0 => '失效'],
            ]
        ],
        'user_add' => [
            'ajax' => '/ajax/user/add',
            'select_menu' => 'user_add',
        ],
        'user_show' => [
            'select_menu' => 'user_show',
        ],
        'user_update' => [
            'ajax' => '/ajax/user/update',
            'select_menu' => 'user_update',
        ]
    ];


    /**
     * 获取配置信息
     * @author gaojian291
     * @date 2017-05-23
     * @param string $key required key
     * @return array
     */
    public static function getConfig($key)
    {
        if (isset(self::$config[$key]))
        {
            return self::$config[$key];
        }
        return [];

    }

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
            foreach ($rules as $key => $val) {
                if (isset(static::$tpl[$key])) {
                    $returnTpl[$key] = static::$tpl[$key];
                    $returnTpl[$key] = array_merge($returnTpl[$key], $val);
                }
            }
        }
        foreach ($data as $key => $val) {
            if (isset($returnTpl[$key])) {
                $returnTpl[$key]['value'] = $val;
            }
        }
        return $returnTpl;
    }


    /**
     * 列表数据处理，按钮处理
     * @author gaojian291
     * @date 2017-05-19
     * @param array $data required 列表数据
     * @return array
     */
    public static function formatData($data)
    {
        foreach ($data as $key => &$val) {                                        //处理操作按钮
            unset($val['password']);
            $val['buttons'] = [
                [
                    'type' => 'page',
                    'name' => '查看',
                    'url' => "/user/show/{$val['id']}"
                ],
                [
                    'type' => 'page',
                    'name' => '更新',
                    'url' => "/user/update/{$val['id']}"
                ],
                [
                    'type' => 'page',
                    'name' => '分配角色',
                    'url' => "/user/alignRole/{$val['id']}"
                ],
                [
                    'type' => 'ajax',
                    'name' => '删除',
                    'url' => "/ajax/user/delete/{$val['id']}"
                ]
            ];
            $val['create_time'] = date('Y-m-d H:i:s', $val['create_time']);
            $val['update_time'] = date('Y-m-d H:i:s', $val['update_time']);
        }
        return $data;
    }

}
