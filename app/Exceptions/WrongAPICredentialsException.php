<?php namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Class WrongAPICredentialsException
 *
 * @package App\Exceptions
 */
class WrongAPICredentialsException  extends ExceptionHandler {

    /**
     * @return string
     */
    function __toString()
    {
        return $this->code . ": " . $this->getMessage();
    }
}