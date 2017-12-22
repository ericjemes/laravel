<?php

/**
 * 异常Code
 * @desc 异常码有8位 前两位是系统code,中间两位是业务code,最后四位是异常code
 * @desc 99开头的是公用的异常code
 * Manage code : {11000000 ~ 11999999}
 * 公用异常code {99000000 ~ 99999999}
 * @return array
 */

return [

    /*****************************公用异常code {990000 ~ 999999}*********************************/
    'REQUEST_PARAMETERS_ERROR'               => ['请求参数异常','999998'],
    'TOKEN_NOT_VALID_EXCEPTION'              => ['token异常','999997'],


    /*****************************数据异常code {990100 ~ 990199}*********************************/
    'DATA_NOT_FIND_EXCEPTION'                => ['当前数据不存在','990100'],


    /*****************************用户异常code {100000 ~ 100099}*********************************/
    'USER_NOT_FIND_EXCEPTION'                => ['用户账户不存在','100001'],
    'USER_PASSWORD_INVALID_EXCEPTION'        => ['用户密码错误','100002'],
    'USER_MOBILE_EXIST_EXCEPTION'            => ['当前手机号已存在','100003'],
    'COMFIRM_PASSWROD_INVALID_EXCEPTION'     => ['两次输入的密码不一致','100004'],
    'MENU_NOT_FIND_EXCEPTION'                => ['当前菜单不存在','100010'],
    'MENU_KEY_EXIST_EXCEPTION'               => ['菜单唯一key已经存在','100011'],




    /*****************************角色异常code {100100 ~ 100199}*********************************/
    'ADMIN_ROLE_CAN_NOT_ALIGN'              => ['超级管理员角色不可编辑','100100'],
    'ROLE_NOT_FIND_EXCEPTION'               => ['当前角色不存在','100101'],


];