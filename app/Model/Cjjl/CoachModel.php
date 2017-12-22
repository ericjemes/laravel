<?php

namespace App\Model\Cjjl;


class CoachModel extends \App\Model\BaseModel
{

    protected $table = 'coach';

    protected $primaryKey = 'c_id';

    const CREATED_AT = 'c_create_time';

    const UPDATED_AT = 'uptimestamp';

    /**
     * 获取当前时间
     * @return integer
     */
    public function freshTimestamp()
    {
        return time();
    }

    /**
     * 转换日期时间
     * @param  $mValue 日期时间
     * @return integer
     */
    public function fromDateTime($mValue)
    {
        return $mValue;
    }

    /**
     * 使用时间戳, 不自动格式化时间
     * @return array
     */
    public function getDates()
    {
        return [];
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'c_id',
        'c_s_id',
        'c_u_id',
        'c_nickname',
        'c_phone',
        'c_color',
        'c_card',
        'c_introduce',
        'c_create_time',
        'c_s_name',
        'c_face',
        'sourceSelf',
        'sourceEdt',
        'total',
        'isCard',
        'isRed',
        'markSource',
        'markBack',
        'markOpition',
        'markNo',
        'markOther',
        'markTime',
        'u_city_id',
        'uptimestamp',
        'vip',
        'auth',
        'totalFee',
        'sex',
        'comment_star',
        'comment_count',
        'svip'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
