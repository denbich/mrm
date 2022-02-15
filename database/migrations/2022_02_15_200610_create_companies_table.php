<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('street');
            $table->string('building_number');
            $table->string('citt');
            $table->string('postcode');
            $table->string('telephone');
            $table->string('facebook')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('discount');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
