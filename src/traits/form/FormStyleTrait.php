<?php
/**
 * Trensy\FormBuilder表单生成器
 * Author: xaboy
 * Github: https://github.com/xaboy/form-builder
 */

namespace Trensy\FormBuilder\traits\form;


use Trensy\FormBuilder\components\Col;
use Trensy\FormBuilder\components\FormStyle;
use Trensy\FormBuilder\components\Row;

/**
 * Class FormStyleTrait
 * @package Trensy\FormBuilder\traits\form
 */
trait FormStyleTrait
{

    /**
     * @param int $span
     * @return Col
     */
    public static function col($span = 24)
    {
        return new Col($span);
    }

    /**
     * @param int $gutter
     * @param string $type
     * @param string $align
     * @param string $justify
     * @param string $className
     * @return Row
     */
    public static function row($gutter = 0, $type = '', $align = '', $justify = '', $className = '')
    {
        return new Row($gutter,$type,$align,$justify,$className);
    }

    /**
     * @param bool $inline
     * @param string $labelPosition
     * @param int $labelWidth
     * @param bool $showMessage
     * @param string $autocomplete
     * @return FormStyle
     */
    public static function style($inline = false, $labelPosition = 'right', $labelWidth = 125, $showMessage = true, $autocomplete = 'off')
    {
        return new FormStyle($inline,$labelPosition,$labelWidth,$showMessage,$autocomplete);
    }
}