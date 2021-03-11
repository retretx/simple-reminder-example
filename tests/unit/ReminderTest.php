<?php

use App\RemindUserInterface;
use App\Service\Reminder;
use Codeception\Test\Unit;
use Symfony\Component\Mime\Address;

class ReminderTest extends Unit
{

    protected Reminder $reminder;

    protected function _inject(Reminder $reminder): void
    {
        $this->reminder = $reminder;
    }

    public function testSend(): void
    {
        $user = new class implements RemindUserInterface {

            public function getName(): string
            {
                return 'Username';
            }

            public function getEmail(): Address
            {
                return new Address(address: 'retretx@gmail.com', name: $this->getName());
            }
        };

        try {
            $this->reminder->send(user: $user, message: 'Test message');
        } catch (Exception $exception)
        {
            self::fail(message: "Failed with $exception");
        }

    }
}
