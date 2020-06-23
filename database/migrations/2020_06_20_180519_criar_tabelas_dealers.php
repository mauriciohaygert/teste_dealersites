<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelasDealers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->string('email', 250)->unique();
            $table->boolean('active');
           
        });

        Schema::create('users_access', function (Blueprint $table) {
            $table->id();
            $table->dateTime('last_login');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users_access');
        Schema::dropIfExists('users');
    }

}