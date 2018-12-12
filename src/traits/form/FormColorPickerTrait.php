<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\ColorPicker;

/**
 * Class FormColorPickerTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormColorPickerTrait
{
    /**
     * @param $field
     * @param $title
     * @param string $value
     * @return ColorPicker
     */
    public static function color($field, $title, $value = '')
    {
        return new ColorPicker($field, $title, (string)$value);
    }
}