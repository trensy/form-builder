<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Option;

/**
 * Class FormOptionTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormOptionTrait
{
    /**
     * @param $value
     * @param string $label
     * @param bool $disabled
     * @return Option
     */
    public static function option($value, $label = '', $disabled = false)
    {
        return new Option($value,$label,$disabled);
    }
}