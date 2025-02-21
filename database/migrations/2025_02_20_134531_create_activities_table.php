<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('output_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('target')->nullable();
            $table->text('q1_progress')->nullable();
            $table->integer('total_participants')->default(0);
            $table->integer('male_participants')->default(0);
            $table->integer('female_participants')->default(0);
            $table->decimal('budget', 15, 2)->nullable();
            $table->integer('progress_percentage')->default(0);
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
