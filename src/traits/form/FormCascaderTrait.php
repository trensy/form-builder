<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Cascader;

/**
 * Class FormCascaderTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormCascaderTrait
{
    /**
     * 多级联动组件
     * @param $field
     * @param $title
     * @param array $value
     * @param string $type
     * @return Cascader
     */
    public static function cascader($field, $title, array $value = [], $type = Cascader::TYPE_OTHER)
    {
        $cascader = new Cascader($field, $title, $value);
        $cascader->type($type);
        return $cascader;
    }


    /**
     * 省市二级联动
     * @param $field
     * @param $title
     * @param array|string $province
     * @param string $city
     * @return Cascader
     */
    public static function city($field, $title, $province = [], $city = '')
    {
        if(is_array($province))
            $value = $province;
        else
            $value = [(string)$province, (string)$city];

        $cascader = self::cascader($field, $title, $value, Cascader::TYPE_CITY);
        $cascader->jsData('province_city');
        return $cascader;
    }


    /**
     * 省市区三级联动
     * @param $field
     * @param $title
     * @param array|string $province
     * @param string $city
     * @param string $area
     * @return Cascader
     */
    public static function cityArea($field, $title, $province = [], $city = '', $area = '')
    {
        if(is_array($province))
            $value = $province;
        else
            $value = [(string)$province, (string)$city, (string)$area];

        $cascader = self::cascader($field, $title, $value, Cascader::TYPE_CITY_AREA);
        $cascader->jsData('province_city_area');
        return $cascader;
    }
}