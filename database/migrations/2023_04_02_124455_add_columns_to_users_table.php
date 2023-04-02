<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('last_name')->after('name');
            $table->date('birthday')->after('email')->nullable();
            $table->string('phone')->after('email');
            $table->string('adress')->after('email')->nullable();
            $table->string('document')->after('email')->nullable();
            $table->string('description')->after('email')->nullable();
            $table->tinyInteger('status')->after('email')->nullable()->default('1');
            $table->foreignId('role_id')->after('email')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->after('email')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
