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
        Schema::create('tbl_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('job_category_id')->constrained('job_categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('experience')->nullable();
            $table->string('employment_type');
            $table->string('salary_range')->nullable();
            $table->unsignedTinyInteger('status')->default(1); // 1=active, 0=closed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

// id (PK)
// user_id (FK → users.id)
// job_category_id (FK → job_categories.id)
// title
// description
// location
// employment_type
// salary_range
// status (tinyint) – 1=active, 0=closed
// created_at
// updated_at

