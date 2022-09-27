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
        Schema::create('zipcode', function (Blueprint $table) {
            $table->id();
            $table->string('local_gov_id');
            $table->string('zip_code');
            $table->string('state_name');
            $table->string('city');
            $table->string('domain_name');
            $table->string('kana_state_name');
            $table->string('kana_city');
            $table->string('kana_domain_name');
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
        Schema::dropIfExists('zipcode');
    }
};
