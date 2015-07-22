<?php
/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 7/22/15
 * Time: 7:28 PM
 */
namespace Pixi\CoreBundle\Utils;


class StringUtils {

    public static function startsWith($haystack, $needle){
        $length = strlen($needle);
        return substr($haystack, 0, $length) == $needle;
    }

    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
}