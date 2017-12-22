<?php

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends BaseModel
{
//    use SoftDeletes;

    protected $table = 't_manage_user';

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


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
