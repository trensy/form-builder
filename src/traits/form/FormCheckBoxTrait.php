<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;

use Trensy\FormBuilder\components\Checkbox;

/**
 * Class FormCheckBoxTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormCheckBoxTrait
{
    /**
     * @param $field
     * @param $title
     * @param array $value
     * @return Checkbox
     */
    public static function checkbox($field, $title, array $value = [])
    {
        return new Checkbox($field, $title, $value);
    }
}