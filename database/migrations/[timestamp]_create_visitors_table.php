<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('visitors')) {
            Schema::create('visitors', function (Blueprint $table) {
                $table->id();
                $table->string('ip_address');
                $table->text('user_agent')->nullable();
                $table->string('device')->nullable();
                $table->string('browser')->nullable();
                $table->string('platform')->nullable();
                $table->string('location')->nullable();
                $table->timestamp('visited_at');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('visitors');
    }
};
