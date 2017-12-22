<?php
namespace App\Model;

class ActivityGift extends BaseModel
{

    protected $table = 't_activity_gift';

    protected $primaryKey = 'id';

    protected $status_column = 'status';                                        //软删除字段

    protected $status_value = 1;                                                //软删除字段有效值 1为有效

    protected $result_type = 'array';

    const CREATED_AT = 'create_time';

    const UPDATED_AT = 'update_time';

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
        'id',
        'stu_mobile',
        'stu_name',
        'stu_portrait',
        'gift_type',
        'gift_name',
        'image_addr',
        'coach_id',
        'coach_mobile',
        'coach_name',
        'coach_reply',
        'status',
        'create_time',
        'update_time',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
//        'password'
    ];
}
