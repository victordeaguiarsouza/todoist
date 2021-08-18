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
            $table->foreignId('id_user');
            $table->foreignId('id_list');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_list')->references('id')->on('lists');
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_list');
            $table->string('description', 100);
            $table->text('details')->nullable();
            $table->boolean('completed')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_list')->references('id')->on('lists')->onDelete('cascade');
        });

        Schema::create('subtasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_main_task');
            $table->foreignId('id_task');
            $table->timestamps();

            $table->foreign('id_main_task')->references('id')->on('tasks');
            $table->foreign('id_task')     ->references('id')->on('tasks');
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
