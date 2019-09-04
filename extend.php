<?php

namespace Ghostiq\FlarumTelegram;

use Flarum\Extend;
use Illuminate\Contracts\Events\Dispatcher;

return [
    new Extend\Locales(__DIR__.'/locale'),
    
    (new Extend\Frontend('admin'))
        ->js(__DIR__.'/js/dist/admin.js'),
        
    (new Extend\Frontend('forum'))
        ->js(__DIR__.'/js/dist/forum.js')
        ->css(__DIR__.'/less/forum.less'),
     
    function (Dispatcher $events) {
        $events->subscribe(Listeners\AddUserAttributes::class);
        $events->subscribe(Listeners\Assets::class);
        $events->subscribe(Listeners\EnableTelegramNotifications::class);
        $events->subscribe(Listeners\InjectSettings::class);
        $events->subscribe(Listeners\RegisterAuthRoute::class);
        $events->subscribe(Listeners\SendTelegramNotifications::class);
    },
];
