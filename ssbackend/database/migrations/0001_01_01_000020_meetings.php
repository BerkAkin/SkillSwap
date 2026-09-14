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
        Schema::create('meetings',function(Blueprint $table){
            $table->id();
            $table->foreignId('advert_id')->constrained()->cascadeOnDelete();
            $table->foreignId('offer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('adverter_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('offerer_id')->constrained('users')->cascadeOnDelete();
            $table->string('adverter_approval');
            $table->string('offerer_approval');
            $table->string('status');
            $table->foreignId('meeting_type_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
