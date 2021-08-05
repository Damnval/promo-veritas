<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrants', function (Blueprint $table) {
            $table->id();
            $table->biginteger('user_id')
                  ->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            $table->string('email')
                  ->email()
                  ->unique();
            $table->string('participant_name');
            $table->string('contact_no');
            $table->string('address');
            $table->string('marketing_strategy');
            $table->decimal('estimated_cost', 19, 2);
            $table->decimal('estimated_roi', 19, 2);
            $table->string('title');
            $table->boolean('is_winner');
            $table->enum('mechanic', ['moment', 'chance']);
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
        Schema::dropIfExists('entrants');
    }
}
