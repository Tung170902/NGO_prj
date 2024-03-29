<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates_campaigns', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('order_desc');
            $table->boolean('status');
            $table->timestamps();
            
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('campaign_id')
            ->references('id')
            ->on('campaigns')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donates_campaigns');
    }
}
