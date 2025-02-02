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
        Schema::create('verification_codes', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_uuid')->constrained(table: 'users', column: 'uuid', indexName: 'verification_codes_user_uuid_foreign');
            $table->string('code', 10);
            $table->enum('type', ['email', 'password']);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('invalidated_at')->nullable();
            $table->index(['user_uuid', 'code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verification_codes');
    }
};
