<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('aux_histories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->enum('type_aux', ['Time In', 'Time Out', 'First 15 Mins', 'Second 15 Mins', 'Meeting Time In', 'Meeting Time Out', 'Coaching', 'BIO Break', 'Huddle', 'Wellness', 'Moderation']);
            $table->text('remark')->nullable();
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('modified_by');
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aux_histories');
    }
};
