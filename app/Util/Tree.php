<?php namespace App\Util;


/**
 * 菜单树状数据格式处理
 * @desc tree
 * @package \App\Util
 * @author gaojian291
 * @date 2017-01-04
 */
class Tree
{

    /**
     * 根据当前ID和父级ID,生成上下级关系的数组
     * @param array $data required [
     *      '0'=>['id'=>1,'parentid'=>0,'name'=>'aa'],
     *      '1'=>['id'=>2,'parentid'=>1,'name'=>'bb'],
     *      '2'=>['id'=>3,'parentid'=>2,'name'=>'cc'],
     * ]
     * @param string $parentID required 父级ID字段名称
     * @param string $currID required 子级ID字段名称
     * @param string $childName option 生成的数组子菜单的key名称
     * @return array
     */
    public static function _formatMenuData(array $data, $parentID = 'iParentID', $currID = 'iAutoID', $childName = 'subMenu')
    {
        $menulist = [];
        foreach ($data as $key => $val) {
            $val[$childName] = [];                          //没人节点都有一个$childName子节点
            if (!isset(${$val[$currID]})) {
                ${$val[$currID]} = $val;                      //每个节点定义一个变量
            }
        }
        foreach ($data as $key => $val) {
            $pid = &${$val[$parentID]};                     //父节点指向地址
            if (!isset($pid[$childName])) {                 //父节点创建子节点目录
                $pid[$childName] = [];
            }
            $pid[$childName][] = &${$val[$currID]};         //子节点地址处理
            if (empty($val[$parentID])) {                   //父级ID为0或者为空，则默认为根目录
                $menulist [] = &${$val[$currID]};           //根节点付给返回的数组
            }
        }
        foreach ($data as $key => $val) {                   //释放变量
            unset(${$val[$currID]});
        }
        return $menulist;
    }
}
