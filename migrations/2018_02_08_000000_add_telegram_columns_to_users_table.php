<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;

return [
    'up' => function (Builder $schema) {
        $schema->table('users', function (Blueprint $table) {
            $table->unsignedInteger('ghostiq_flarumtelegram_id')->nullable()->unique();
            $table->string('ghostiq_flarumtelegram_error', 50)->nullable();
        });
    },
    'down' => function (Builder $schema) {
        $schema->table('users', function (Blueprint $table) {
            $table->dropColumn('ghostiq_flarumtelegram_id');
            $table->dropColumn('ghostiq_flarumtelegram_error');
        });
    },
];
