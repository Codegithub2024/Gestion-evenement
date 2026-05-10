<?php
namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $codeString;
    protected $statusCode;
    protected $details;


    public function __construct(
        string $codeString = 'INTERNAL_ERROR',
        string $message = "",
        int $statusCode = 400,
        array $details = []
    ) {
        parent::__construct($message);
        $this->codeString = $codeString;
        $this->statusCode = $statusCode;
        $this->details = $details;
    }

    public function getCodeString() { return $this->codeString; }
    public function getStatusCode() { return $this->statusCode; }
    public function getDetails() { return $this->details; }
}
