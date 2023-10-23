<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("tasks", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("name");
            $table->string("description");
            $table->timestamp("starting");
            $table->timestamp("ending");
            $table->timestamp("completed_at")->nullable();
            $table->boolean("complete")->default(false);
            $table->unsignedBigInteger("next_task_id")->nullable();
            $table->unsignedBigInteger("parent_task_id")->nullable();
            $table->unsignedBigInteger("board_id");
            $table->timestamps();

            $table->index("name");
            $table->index("board_id");
        });

        Schema::table("tasks", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("next_task_id")->references("id")->on("tasks");
            $table->foreign("parent_task_id")->references("id")->on("tasks");
            $table->foreign("board_id")->references("id")->on("boards");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("tasks");
    }
};
