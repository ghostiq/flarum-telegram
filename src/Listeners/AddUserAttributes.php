<?php

namespace Flagrow\Telegram\Listeners;

use Flarum\Api\Serializer\CurrentUserSerializer;
use Flarum\Api\Event\Serializing;
use Illuminate\Contracts\Events\Dispatcher;

class AddUserAttributes
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Serializing::class, [$this, 'addAttributes']);
    }

    public function addAttributes(Serializing $event)
    {
        if ($event->isSerializer(CurrentUserSerializer::class)) {
            $event->attributes['canReceiveTelegramNotifications'] = !is_null($event->model->flagrow_telegram_id);
            $event->attributes['flagrowTelegramError'] = $event->model->flagrow_telegram_error;
        }
    }
}
