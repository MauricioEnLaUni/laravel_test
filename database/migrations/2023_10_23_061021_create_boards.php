<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("boards", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("project_id");
            $table->string("name")->unique();
            $table->string("description");
            $table->timestamps();
        });

        Schema::table("boards", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("project_id")->references("id")->on("projects");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("boards");
    }
};
