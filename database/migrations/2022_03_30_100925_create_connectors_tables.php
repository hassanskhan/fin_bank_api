<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connectors', function (Blueprint $table) {
            $table->id();
            $table->string('connector')->default('finapiConnector');
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->string('token_type')->nullable();
            $table->string('expires_in')->nullable();
            $table->string('scope')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connectors');
    }
}
