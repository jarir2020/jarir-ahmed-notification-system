<?php

namespace JarirAhmed\NotificationSystem;

class Notification
{
    protected $type;
    protected $message;

    const SUCCESS = 'success';
    const WARNING = 'warning';
    const ERROR = 'error';
    const INFO = 'info';

    public static function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public static function getType()
    {
        return $this->type;
    }

    public static function getMessage()
    {
        return $this->message;
    }

    public static function create($type, $message)
    {
        return new self($type, $message);
    }
}
