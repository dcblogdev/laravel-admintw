<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->foreignUuid('tenant_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenant_users');
    }
};
