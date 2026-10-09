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
        Schema::create('_student', function (Blueprint $table) {
            $table->id();
            $table->string('name', 225);
            $table->string('phone', 100);
            $table->string('address', 225);
            $table->string('image', 225);
            $table->string('notes', 225);
            $table->string('national_id',30);
            $table->tinyInteger('active')->default(1)->comment('هل  مفعل مسجل ام غير مسجل  ');
            $table->foreignId('contry_id')->references('id')->on('_countries')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_student');
    }
};
