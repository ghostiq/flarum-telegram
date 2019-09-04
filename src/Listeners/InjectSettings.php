<?php

namespace Ghostiq\FlarumTelegram\Listeners;

use Flarum\Api\Serializer\ForumSerializer;
use Flarum\Api\Event\Serializing;
use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class InjectSettings
{
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        $this->settings = $settings;
    }

    public function subscribe(Dispatcher $events)
    {
        $events->listen(Serializing::class, [$this, 'settings']);
    }

    public function settings(Serializing $event)
    {
        if ($event->serializer instanceof ForumSerializer) {
            $event->attributes['ghostiq-flarumtelegram.enableNotifications'] = (bool)$this->settings->get('ghostiq-flarumtelegram.enableNotifications');
            $event->attributes['ghostiq-flarumtelegram.botUsername'] = $this->settings->get('ghostiq-flarumtelegram.botUsername');
        }
    }
}
