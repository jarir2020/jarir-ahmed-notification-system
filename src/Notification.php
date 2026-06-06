<?php

namespace JarirAhmed\NotificationSystem;

class Notification
{
    const SUCCESS = 'success';
    const WARNING = 'warning';
    const ERROR = 'error';
    const INFO = 'info';

    /** @var string */
    protected $type;
    /** @var string */
    protected $message;

    public function __construct(string $type, string $message)
    {
        $this->type = self::normalizeType($type);
        $this->message = $message;
    }

    public static function create(string $type, string $message): self
    {
        return new self($type, $message);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /** @return array{type:string,message:string} */
    public function toArray(): array
    {
        return ['type' => $this->type, 'message' => $this->message];
    }

    /**
     * Render as an HTML snippet. The message is HTML-escaped, so rendering a
     * notification server-side cannot inject markup/script (XSS-safe).
     */
    public function toHtml(): string
    {
        $type = htmlspecialchars($this->type, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($this->message, ENT_QUOTES, 'UTF-8');
        return '<div class="notification ' . $type . '">' . $message . '</div>';
    }

    /** Unknown types fall back to INFO. */
    private static function normalizeType(string $type): string
    {
        $allowed = [self::SUCCESS, self::WARNING, self::ERROR, self::INFO];
        return in_array($type, $allowed, true) ? $type : self::INFO;
    }
}
