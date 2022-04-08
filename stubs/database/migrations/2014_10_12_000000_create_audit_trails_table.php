<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditTrailsTable extends Migration
{
    public function up()
    {
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('title');
            $table->text('link')->nullable();
            $table->uuid('reference_id')->nullable();
            $table->string('section');
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();

            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('audit_trails');
    }
}
