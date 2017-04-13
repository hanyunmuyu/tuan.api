<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 17-4-13
 * Time: 下午1:15
 */
function changeKey($key)
{
    $keys = explode('_', $key);
    $res = '';
    if (count($keys) > 1) {
        foreach ($keys as $key => $v) {
            if ($key > 0) {
                $res .= ucfirst($v);
            } else {
                $res .= $v;
            }
        }
    } else {
        return $key;
    }
    return $res;
}

function delNull($data)
{
    if (is_array($data)) {
        foreach ($data as $key => $v) {
            $data[$key] = delNull($v);
        }
        return $data;
    } else {
        return is_null($data) ? "" : $data;
    }
}

function changeArrayKey($arr)
{
    $tmp = [];
    if (empty($arr) || is_null($arr) || !is_array($arr)) {
        return $tmp;
    }
    foreach ($arr as $key => $v) {
        if (is_int($key)) {
            if (is_array($v)) {
                $tmp[changeKey($key)] = changeArrayKey(delNull($v));
            } else {
                $tmp[changeKey($key)] = delNull($v);
            }
        } else {
            if (is_array($v)) {
                $tmp[changeKey($key)] = changeArrayKey(delNull($v));
            } else {
                $tmp[changeKey($key)] = delNull($v);
            }
        }
    }
    return $tmp;
}
