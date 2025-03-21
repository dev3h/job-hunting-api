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
        Schema::create('job_employs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->json('type');
            $table->json('categories');
            $table->json('levels')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->json('salary_range');
            $table->json('required_skills');
            $table->text('description');
            $table->text('responsibility');
            $table->text('qualification');
            $table->text('nice_to_have');
            $table->text('benefit');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_employs');
    }
};
