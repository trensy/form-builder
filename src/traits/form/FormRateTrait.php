<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Rate;

/**
 * Class FormRateTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormRateTrait
{
    /**
     * @param $field
     * @param $title
     * @param number $value
     * @return Rate
     */
    public static function rate($field, $title, $value = 0)
    {
        return new Rate($field, $title, (float)$value);
    }
}