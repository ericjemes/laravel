<?php
/**
 * 这个文件是无命名空间的助手函数
 * 添加此类函数注意影响面
 */

if (!function_exists('array_get1')) {
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @author chengjinsheng718
     * @param  string $key
     * @param  mixed $default
     * @return mixed
     */

    function array_get1($array, $key, $default = null)
    {
        return \App\Util\Arr::get($array, $key, $default);
    }
}




