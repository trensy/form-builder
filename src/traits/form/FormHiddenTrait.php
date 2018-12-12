<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Hidden;

/**
 * Class FormHiddenTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormHiddenTrait
{
    /**
     * @param $field
     * @param $value
     * @return Hidden
     */
    public static function hidden($field, $value)
    {
        return new Hidden($field, $value);
    }
}