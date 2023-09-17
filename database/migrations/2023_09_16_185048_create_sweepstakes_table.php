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
        Schema::create('sweepstakes', function (Blueprint $table) {
            $table->uuid(column: "id")->primary();
            // a chave estrangeira abaixo já vai entender que é do user, documentação do laravel explica
            $table->foreignId(column: "user_id")->constrained();
            $table->integer(column: "number_of_winners")->default(value: 1);
            $table->dateTime(column: "end_date")->nullable();
            $table->text(column: "description")->nullable();
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
        Schema::dropIfExists('sweepstakes');
    }
};
