<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->uuid('assigned_to_user_id');
            $table->uuid('assigned_from_user_id')->default(0);
            $table->string('link')->nullable();
            $table->boolean('viewed')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
