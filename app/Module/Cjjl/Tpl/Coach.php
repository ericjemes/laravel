<?php

namespace App\Module\Cjjl\Tpl;


class Coach
{
    public static $tpl = [
        'c_id' => [
            'key' => 'c_id',
            'name' => 'ID',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'c_phone' => [
            'key' => 'c_phone',
            'name' => '手机号',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'c_nickname' => [
            'key' => 'c_nickname',
            'name' => '教练名称',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'c_s_id' => [
            'key' => 'c_s_id',
            'name' => '驾校ID',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'u_city_id' => [
            'key' => 'u_city_id',
            'name' => '所在城市',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'vip' => [
            'key' => 'vip',
            'name' => '是否vip',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                ''=>'请选择',
                1 => '是',
                0 => '否',
            ],
        ],
        'svip' => [
            'key' => 'svip',
            'name' => '是否svip',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                ''=>'请选择',
                1 => '是',
                0 => '否',
            ],
        ],
        'auth' => [
            'key' => 'auth',
            'name' => '是否认证',
            'type' => 'select',
            'require' => true,
            'readonly' => false,
            'value' => '',
            'list' => [
                ''=>'请选择',
                1 => '是',
                0 => '否',
            ],
        ],
        'comment_count' => [
            'key' => 'comment_count',
            'name' => '评论数',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
        'comment_star' => [
            'key' => 'comment_star',
            'name' => '评论星级',
            'type' => 'text',
            'require' => false,
            'readonly' => false,
            'value' => '',
            'list' => [],
        ],
    ];

    public static $map = [
        'auth' =>  [
            0 => '未认证',
            1 => '已认证'
        ],
        'vip'=>[
            1 => '是',
            0 => '否'
        ],
        'svip'=>[
            1 => '是',
            0 => '否'
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


    //user页面配置信息
    public static $config = [
        'user_list' => [
            'select_menu' => 'coach_list',
            'head' => [
                'c_id' => '教练id',
                'c_nickname' => '教练名称',
                'c_phone' => '手机号',
                'c_s_id' => '驾校ID',
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
     * 列表数据处理，按钮处理
     * @author gaojian291
     * @date 2017-05-19
     * @param array $data required 列表数据
     * @return array
     */
    public static function formatData($data)
    {
        foreach ($data as $key => &$val) {                                        //处理操作按钮
            $val['buttons'] = [
                [
                    'type' => 'page',
                    'name' => '查看',
                    'url' => "/coach/show/{$val['c_id']}"
                ]
            ];
        }
        return $data;
    }

}
