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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title')->requierd;
            $table->text('description')->requierd;
            $table->string('status')->default('open');
            $table->string('attachment')->nullable();
            //! constrained do the same job as: ->references('id')->on('users')
            $table->foreignId('user_id')->constrained();
            $table->foreign('status_changed_by_id')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
