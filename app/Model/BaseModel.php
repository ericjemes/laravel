<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    /**
     * 列表查询
     * @param array $aCondition 条件 (非必需参数)
     *        可以使用的条件:'>','<','>=','<=','<>','!=','like',where,in，notin，between，notbetween，or，orderby
     *        使用方法见下面的例子；
     * 'aCondition' => [
     * 'sRecommendMobile' => '15262281953', //正常的where条件 sRecommendMobile = 15262281953；
     * '<'                => ['iLastLoginTime' => 14514717626], //代表iLastLoginTime<14514717626;
     * '<>'               => ['iUserID' => 47613, 'iLoginTimes' => 5],//代表iUserID<>47613,iLoginTimes<>5；
     * 'like'             => ['sName' => '%aaa'],//代表sName like %aaa；
     * 'between'          => ['iPayCenterBid' => [1, 10]],//代表 iPayCenterBid between 1 and 10；
     * 'notin'            => ['iCompanyID' => [1, 2]],//代表 not in (1,2)；
     * 'or'               => ['sRecommendMobile' => '15262281953'],//代表 or sRecommendMobile=15262281953；
     * 'orderby'          => ['iLastLoginTime' => 'desc'] //代表 order by iLastLoginTime desc；
     * ]
     * @param int $iPage 当前页
     * @param int $iPerPage 每页多少条
     * @param array $order 主要按哪个字段排序:如['iAutoID'=>'desc']
     * @param int $iLastID 当前页最后一条数据的ID
     * @param int $iLastID 当前页最后一条数据的ID
     * @return array
     */
    public static function getLists($aCondition = [], $iPage = 1, $iPerPage = 10, $order = [], $iLastID = 0)
    {
        //返回结果格式
        $aResult = [
            'total' => 0,
            'page' => $iPage,
            'per_page' => $iPerPage,
            'last_id' => $iLastID,
            'list' => []
        ];
        //参数取值限制
        $iPage = max(intval($iPage), 1);
        $iPerPage = min(max(intval($iPerPage), 1), 1000);
        $iLastID = max(intval($iLastID), 0);
        //根据条件筛选获取结果
        $oModel = new static;
        //获取主键
        $primaryKey = isset($oModel->primaryKey) ? $oModel->primaryKey : 'iAutoID';
        $columns = $oModel->fillable;
        $oModel = $oModel->getCondition($oModel, $aCondition);
        //获取总数
        $total = $oModel->count();
        //获取排序条件
        $order = !empty($order) && is_array($order) ? $order : [$primaryKey => 'desc'];
        $orderField = in_array(array_keys($order)[0], $columns) ? array_keys($order)[0] : $primaryKey;
        $orderMethod = in_array(array_values($order)[0], ['asc', 'desc']) ? array_values($order)[0] : 'desc';
        $oModel = $oModel->orderBy($orderField, $orderMethod);

        //大数据分页
        if (!empty($iLastID)) {
            $fh = ($orderMethod == 'asc') ? '>' : '<';
            $oModel = $oModel->where($primaryKey, $fh, $iLastID);
            $res = $oModel->limit($iPerPage)->get()->toArray();
        } //常规分页
        else {
            $offset = ($iPage - 1) * $iPerPage;
            $res = $oModel->skip($offset)->take($iPerPage)->get()->toArray();
        }
        $aResult['list'] = $res;
        $aResult['total'] = $total;

        return $aResult;
    }

    /**
     * 处理条件参数
     * @param $oModel   数据模型Model
     * @param $aCondition   筛选条件
     * 'aCondition'=>[
     * 'iType'   => 1,
     * '<'       => ['iLastLoginTime' => 14514717626],
     * '<>'      => ['iUserID' => 47613, 'iLoginTimes' => 5],
     * 'between' => ['iPayCenterBid' => [1, 10]],
     * 'notin'   => ['iCompanyID' => [1, 2]],
     * 'or'      => ['sRecommendMobile' => '15262281953'],
     * 'orderby' => ['iLastLoginTime' => 'desc']
     * ]
     * 可以使用的条件：where,in，notin，between，notbetween，or，orderby；后期可扩充
     * @return mixed
     */
    public function getCondition($oModel, $aCondition)
    {
        $newModel = new static;
        //where条件
        $where = ['>', '<', '>=', '<=', '<>', '!=', 'like', '&'];
        $other = [
            'in' => 'whereIn',
            'notin' => 'whereNotIn',
            'between' => 'whereBetween',
            'notbetween' => 'whereNotBetween',
            'or' => 'orWhere',
            'orderby' => 'orderBy'
        ];
        foreach ($aCondition as $key => $val) {
            //键值对(eq情况)直接使用where条件，例如'sSketch'=>115551
            if (!is_array($val)) {
                if (in_array($key, $newModel->columns)) {
                    $oModel = $oModel->where($key, $val);
                }
            } else {
                //区间单值查询，例如'<' => ['iLastLoginTime' => 14514717626]
                if (in_array($key, $where)) {
                    //循环where条件
                    foreach ($val as $k => $v) {
                        if (in_array($k, $newModel->columns)) {
                            $oModel = $oModel->where($k, $key, $v);
                        }
                    }
                } //区间数组查询，例如'between' => ['iPayCenterBid' => [1, 10]]
                elseif (in_array(strtolower($key), array_keys($other))) {
                    //循环where条件
                    if ($key == 'or') {
                        $oModel = self::handleOr($oModel, $val);
                    } else {
                        foreach ($val as $k => $v) {
                            if (in_array($k, $newModel->columns)) {
                                $oModel = $oModel->$other[strtolower($key)]($k, $v);
                            }
                        }
                    }
                }
            }
        }
        return $oModel;
    }
}