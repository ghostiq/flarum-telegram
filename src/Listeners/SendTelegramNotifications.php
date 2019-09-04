<?php

namespace Ghostiq\FlarumTelegram\Listeners;

use Ghostiq\FlarumTelegram\Notifications\TelegramMailer;
use Flarum\Notification\Blueprint\BlueprintInterface;
use Flarum\User\User;
use Flarum\Notification\Event\Sending;
use Illuminate\Contracts\Events\Dispatcher;

class SendTelegramNotifications
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Sending::class, [$this, 'send']);
    }

    public function send(Sending $event)
    {
        /**
         * @var $mailer TelegramMailer
         */
        $mailer = app(TelegramMailer::class);

        foreach ($event->users as $user) {
            if ($this->shouldSendTelegramToUser($event->blueprint, $user)) {
                $mailer->send($event->blueprint, $user);
            }
        }
    }

    protected function shouldSendTelegramToUser(BlueprintInterface $blueprint, User $user)
    {
        if (!$user->getPreference(User::getNotificationPreferenceKey($blueprint::getType(), 'telegram'))) {
            return false;
        }

        return !is_null($user->ghostiq_flarumtelegram_id);
    }
}
