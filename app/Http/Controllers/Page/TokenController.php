<?php
namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Module\Tpl\Token as TokenTpl;
use Illuminate\Http\Request;
use App\Module\Token;


/**
 * Token class
 * @desc more description
 * @date 2018-06-01
 */
class TokenController extends Controller
{

    /**
     * Token lists
     * @date 2018-06-01
     * @param Request $request $request 请求requset对象
     * @return view
     */
    public function lists(Request $request)
    {
        try {
            $filed = [
                'id'=>'sometime|int|min:0',                                                         //自增ID
                'user_id'=>'sometime|int|min:0',                                                    //用户ID
                'token'=>'sometime|string|length:[0,50]',                                           //登录token
                'type'=>'sometime|int|min:0',                                                       //用户类型 0:默认 1:微信
                'status'=>'sometime|int|min:0',                                                     //数据状态:1:正常 0:失效
                'create_time'=>'sometime|int|min:0',                                                //创建时间
                'update_time'=>'sometime|int|min:0',                                                //更新时间
                'page'=>'sometime|int|min:1',                                                       //更新时间
                'size'=>'sometime|int|between:[1,50]',                                              //更新时间
            ];
            $param = self::validate($filed, array_filter($request->all(), function ($val) {return $val != '';}));
            $query = array_except($param, ['page','size']);
            $this->viewData['tpl'] = TokenTpl::getTpl($query);
            $this->viewData['data'] = Token::lists($query, array_get($param,'page',1), array_get($param,'size',10), 'id', 'desc', TokenTpl::$header);
            return $this->view('list');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Token detail
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
            $this->viewData['tpl'] = TokenTpl::getTpl(Token::show($param));
            return $this->view('show');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Token update
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
            $this->viewData['tpl'] = TokenTpl::getTpl(Token::show($param));
            return $this->view('update');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }


    /**
     * Token add
     * @date 2018-06-01
     * @return view
     */
    public function add()
    {
        try {
            $this->viewData['tpl'] = TokenTpl::getTpl();
            return $this->view('add');
        } catch (\Exception $e) {
            return $this->errorView($e->getMessage(), $e->getCode());
        }
    }

}