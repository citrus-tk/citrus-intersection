<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusIntersection. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus;

/**
 * Intersection
 */
class Intersection
{
    /**
     * 基本switch比較
     *
     * @param mixed $value     比較
     * @param array $functions key:比較値, value:callable or value
     * @param bool  $strict    true:厳密比較
     * @return mixed|null callableが返却する値
     */
    public static function fetch($value, array $functions = [], bool $strict = false)
    {
        foreach ($functions as $ky => $function)
        {
            // 厳密比較
            if ((true === $strict and $value === $ky) or (false === $strict and $value == $ky))
            {
                // 関数型
                if (true === is_callable($function))
                {
                    return $function();
                }
                // 変数型
                return $function;
            }
        }
        return null;
    }
}
