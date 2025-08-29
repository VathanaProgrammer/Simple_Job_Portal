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
        Schema::create('jon_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('tbl_jobs')->onDelete('cascade');
            $table->string('type'); // phone, email, telegram, facebook, linkedin, etc.
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jon_contacts');
    }
};


// id (PK)
// job_id (FK → jobs.id)
// type (enum/varchar) – phone, email, telegram, facebook, linkedin, etc.
// value (varchar) – the actual phone number, email address, link, etc.
// created_at
// updated_at