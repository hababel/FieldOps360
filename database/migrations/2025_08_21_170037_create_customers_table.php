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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
						$table->unsignedBigInteger('tenant_id');   // ← clave del tenant
						$table->string('name', 150);
						$table->string('email')->nullable();
						$table->string('phone', 50)->nullable();
						$table->text('address')->nullable();
            $table->timestamps();

						$table->index(['tenant_id', 'name']);
						$table->foreign('tenant_id')->references('id')->on('tenants')->cascadeOnDelete();

		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
