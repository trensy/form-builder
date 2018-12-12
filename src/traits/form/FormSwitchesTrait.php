<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Switches;

/**
 * Class FormSwitchesTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormSwitchesTrait
{
    /**
     * @param $field
     * @param $title
     * @param string $value
     * @return Switches
     */
    public static function switches($field, $title, $value = '0')
    {
        return new Switches($field, $title, $value);
    }
}