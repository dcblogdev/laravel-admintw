<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditTrailsTable extends Migration
{
    public function up()
    {
        Schema::create('audit_trails', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained('users')->onDelete('cascade');
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
