<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create("projects", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->unsignedBigInteger("user_id");
            $table->date("started_at");
            $table->date("ends");
            $table->boolean("complete")->default(false);
            $table->unsignedBigInteger("project_type_id");
            $table->timestamps();

            $table->index("name");
            $table->index("project_type_id");
        });

        Schema::table("projects", function (Blueprint $table) {
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("project_type_id")->references("id")->on("project_types");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("projects");
    }
};
