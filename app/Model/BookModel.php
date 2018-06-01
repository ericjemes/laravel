<?php

namespace App\Model;

class BookModel extends BaseModel
{

    protected $table = 't_book';

    const STATUS = 'status';                                                    //软删除字段

    const CREATED_AT = 'create_time';                                           //创建时间

    const UPDATED_AT = 'update_time';                                           //更新时间

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


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
