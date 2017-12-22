<?php

namespace App\Module\Tpl;


class Role extends BaseTpl
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
        'is_admin' => [
            'key' => 'is_admin',
            'name' => '是否管理员',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                '' => '请选择',
                0 => '否',
                1 => '是'
            ],
        ],
        'name' => [
            'key' => 'name',
            'name' => '角色名称',
            'type' => 'text',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'desc' => [
            'key' => 'desc',
            'name' => '角色描述',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'menu_json' => [
            'key' => 'menu_json',
            'name' => '配置菜单',
            'type' => 'text',
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
            'readonly' => false,
            'value' => '',
            'list' => [
                '' => '请选择',
                1 => '正常',
                0 => '失效'
            ],
        ],
    ];

    //role页面配置信息
    public static $config = [
        'role_list' => [
            'select_menu' => 'role_list',
            'head' => [
                'id' => '角色id',
                'is_admin' => '是否管理员',
                'name' => '角色名称',
                'desc' => '角色描述',
                'create_time' => '创建时间',
                'buttons' => '操作'
            ],
            'map' => [
                'is_admin'   => [0 => '否', 1 => '是'],
                'status'     => [1 => '正常', 0 => '失效'],
            ]
        ],
        'role_add' => [
            'ajax' => '/ajax/role/add',
            'select_menu' => 'role_add',
        ],
        'role_show' => [
            'select_menu' => 'role_show',
        ],
        'role_update' => [
            'ajax' => '/ajax/role/update',
            'select_menu' => 'role_update',
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
                    'url' => "/role/show/{$val['id']}"
                ],
                [
                    'type' => 'page',
                    'name' => '更新',
                    'url' => "/role/update/{$val['id']}"
                ],
                [
                    'type' => 'page',
                    'name' => '分配菜单',
                    'url' => "/role/alignMenu/{$val['id']}"
                ],
                [
                    'type' => 'ajax',
                    'name' => '删除',
                    'url' => "/ajax/role/delete/{$val['id']}"
                ]
            ];
            $val['create_time'] = date('Y-m-d H:i:s', $val['create_time']);
            $val['update_time'] = date('Y-m-d H:i:s', $val['update_time']);
        }
        return $data;
    }

}
