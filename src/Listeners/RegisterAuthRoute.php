<?php

namespace Ghostiq\FlarumTelegram\Listeners;

use Ghostiq\FlarumTelegram\Controllers\TelegramAuthController;
use Flarum\Event\ConfigureForumRoutes;
use Illuminate\Contracts\Events\Dispatcher;

class RegisterAuthRoute
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(ConfigureForumRoutes::class, [$this, 'add']);
    }

    public function add(ConfigureForumRoutes $event)
    {
        $event->get('/auth/telegram', 'auth.telegram', TelegramAuthController::class);
    }
}
