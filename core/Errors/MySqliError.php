<?php

namespace Core\Errors;

use Exception;

class MySqliError extends \Exception {

    public function __construct($message, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}";
    }

    public static function dbError($message) {
        throw new MySqliError($message);
    }

}