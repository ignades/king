<?php namespace App\Exceptions;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
/**
 * Class WrapException
 *
 * @package App\Exceptions
 */
class WrapException extends ExceptionHandler {

    /**
     * @return string
     */
    function __toString()
    {
        return $this->code . ": " . $this->getMessage();
    }
}