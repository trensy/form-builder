<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Radio;

/**
 * Class FormRadioTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormRadioTrait
{
    /**
     * @param $field
     * @param $title
     * @param string $value
     * @return Radio
     */
    public static function radio($field, $title, $value = '')
    {
        return new Radio($field, $title, (string)$value);
    }
}