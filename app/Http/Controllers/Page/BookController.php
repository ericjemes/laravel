<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Tpl\Book as BookTpl;
use Illuminate\Http\Request;
use App\Module\Book;


/**
 * Book class
 * @desc more description
 * @date 2018-06-01
 */
class BookController extends Controller
{

    /**
     * Book lists
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return view
     */
    public function lists(Request $request)
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
                'page'=>'sometime|int|min:1',                                                       //更新时间
                'size'=>'sometime|int|between:[1,50]',                                              //更新时间
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $query = array_except($param, ['page','size']);
            $this->viewData['tpl'] = BookTpl::getTpl($query);
            $this->viewData['data'] = Book::lists($query, array_get($param,'page',1), array_get($param,'size',10), 'id', 'desc', BookTpl::$header);
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Book detail
     * @date 2018-06-01
     * @param int $id request 主键id
     * @return view
     */
    public function show($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $param = compact('id');
            $param = self::validate($filed, $param);
            $this->viewData['tpl'] = BookTpl::getTpl(Book::show($param));
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Book update
     * @date 2018-06-01
     * @param int $id request 主键id
     * @return view
     */
    public function update($id)
    {
        try {
            $filed = [
                'id' => 'require|uint|min:1',
            ];
            $param = compact('id');
            $param = self::validate($filed, $param);
            $this->viewData['tpl'] = BookTpl::getTpl(Book::show($param));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Book add
     * @date 2018-06-01
     * @return view
     */
    public function add()
    {
        try {
            $this->viewData['tpl'] = BookTpl::getTpl();
            return $this->view('add');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

}