<?php
/**
 * Created by PhpStorm.
 * User: berm
 * Date: 10-2-18
 * Time: 17:07
 */

class ObjectChecker
{
    /**
     * @param $source
     * @param $victim
     * @return bool
     */
    public function typeMatcher($source, $victim)
    {
        if (is_object($source) && is_object($victim)) {
            if (get_class($source) == get_class($victim)) {
                return true;
            } else {
                return false;
            }
        } else {
            trigger_error("Both arguments must be objects.");
            return false;
        }
    }
}