<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('users_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('list_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('list_id');
            $table->foreignId('user_id');
            $table->string('description', 100);
            $table->text('details')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('list_id')->references('id')->on('lists')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_task_id');
            $table->foreignId('task_id');
            $table->timestamps();

            $table->index(['main_task_id', 'task_id'])->unique();

            $table->foreign('main_task_id')->references('id')->on('tasks');
            $table->foreign('task_id')     ->references('id')->on('tasks');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subtasks');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('users_lists');
        Schema::dropIfExists('lists');
    }
}
