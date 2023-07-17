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
        Schema::create('eletros', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('tension');
            $table->string('brand');
            $table->decimal('price',8,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_eletros');
    }
};
