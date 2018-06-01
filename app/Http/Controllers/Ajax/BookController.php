<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Module\Book as BookModule;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * 数据添加
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function add(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'title'=>'sometime|string|length:[0,100]',                                          //书名
                'desc'=>'sometime|string|length:[0,200]',                                           //描述
                'author'=>'sometime|string|length:[0,100]',                                         //作者
                'cover'=>'sometime|string|length:[0,500]',                                          //封面
                'price'=>'sometime|int|min:0',                                                      //价格 单位:分
                'publisher'=>'sometime|string|length:[0,100]',                                      //出版社
                'size'=>'sometime|int|min:0',                                                       //书的大小
                'type'=>'sometime|int|min:0',                                                       //书的类型[0:默认 1:小说 2:传记] 
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(BookModule::add($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 数据更新
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return array
     */
    public function update(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'title'=>'sometime|string|length:[0,100]',                                          //书名
                'desc'=>'sometime|string|length:[0,200]',                                           //描述
                'author'=>'sometime|string|length:[0,100]',                                         //作者
                'cover'=>'sometime|string|length:[0,500]',                                          //封面
                'price'=>'sometime|int|min:0',                                                      //价格 单位:分
                'publisher'=>'sometime|string|length:[0,100]',                                      //出版社
                'size'=>'sometime|int|min:0',                                                       //书的大小
                'type'=>'sometime|int|min:0',                                                       //书的类型[0:默认 1:小说 2:传记] 
                'status'=>'sometime|int|min:0',                                                     //数据状态[1:正常 0:失效]
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
            ];
            $param = self::validate($filed, $request->all());
            return $this->responseSuccess(BookModule::update($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }


    /**
     * 用户删除
     * @date 2018-06-01
     * @param int $id request 主键id
     * @return array
     */
    public function delete($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $param = compact('id');
            $param = self::validate($filed, $param);
            return $this->responseSuccess(BookModule::del($param));
        } catch (\Exception $e) {
            return $this->responseError($e->getCode(), $e->getMessage());
        }
    }
}
