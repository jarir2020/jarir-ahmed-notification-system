<?php

namespace JarirAhmed\NotificationSystem\Tests;

use JarirAhmed\NotificationSystem\Notification;
use JarirAhmed\NotificationSystem\Components\NotificationHelper;
use PHPUnit\Framework\TestCase;

class NotificationTest extends TestCase
{
    public function testConstructAndGetters()
    {
        $n = new Notification(Notification::SUCCESS, 'Saved!');
        $this->assertSame('success', $n->getType());
        $this->assertSame('Saved!', $n->getMessage());
    }

    public function testCreateFactory()
    {
        $n = Notification::create(Notification::ERROR, 'Boom');
        $this->assertInstanceOf(Notification::class, $n);
        $this->assertSame('error', $n->getType());
    }

    public function testUnknownTypeFallsBackToInfo()
    {
        $this->assertSame('info', (new Notification('purple', 'x'))->getType());
    }

    public function testToArray()
    {
        $this->assertSame(
            ['type' => 'warning', 'message' => 'Careful'],
            (new Notification(Notification::WARNING, 'Careful'))->toArray()
        );
    }

    public function testToHtmlEscapesMessage()
    {
        $html = (new Notification(Notification::INFO, '<script>alert(1)</script>'))->toHtml();
        $this->assertStringNotContainsString('<script>alert(1)', $html);
        $this->assertStringContainsString('&lt;script&gt;', $html);
        $this->assertStringContainsString('class="notification info"', $html);
    }

    public function testHelperThrowsWithoutYii()
    {
        // Yii is not installed in the test environment.
        $this->expectException(\RuntimeException::class);
        NotificationHelper::show('hi', 'success');
    }
}
