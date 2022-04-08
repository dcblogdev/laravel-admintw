<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_office_login_only')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_logged_in_at')->nullable();
            $table->string('two_fa_active')->default('No');
            $table->string('two_fa_secret_key')->nullable();
            $table->uuid('invited_by')->nullable();
            $table->timestamp('invited_at')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->string('invite_token')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        if (env('APP_ENV') !== 'testing') {
            DB::statement('ALTER TABLE users ADD FULLTEXT (name, email)');
        }
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
