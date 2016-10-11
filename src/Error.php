<?php

namespace Model;


class Error
{
    /**
     * Get error code message that includes code, message, line
     *
     * @param \Exception $e
     * @return string
     */
    public static function getExceptionText(\Exception $e)
    {
        return "Error Code: " . $e->getCode() . ": " . $e->getMessage() . " on line " . $e->getLine();
    }

    /**
     * Print error message and die if needed to
     *
     * @param string $msg
     * @param bool $die
     */
    public static function printError(string $msg, bool $die)
    {
        echo $msg;
        if ($die) {
            die();
        }
    }
}