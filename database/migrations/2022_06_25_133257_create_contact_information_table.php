<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            // $table->string('phone_numbers')->nullable();
            $table->string('listings')->nullable();
            $table->string('portfolio')->nullable();
            $table->string('book_now')->nullable();
            $table->string('purchase_book')->nullable();
            $table->string('shop_online')->nullable();
            $table->string('more_links')->nullable();
            $table->string('title')->nullable();
            $table->string('job_title')->nullable();
            $table->string('business_name')->nullable();
            $table->string('map_it')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('website')->nullable();
            $table->string('allow_follow')->nullable();
            $table->string('allow_link')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('logo_photo_path')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('googleplus')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('yelp')->nullable();
            $table->string('myspace')->nullable();
            $table->string('foursquare')->nullable();
            $table->string('tumblr')->nullable();
            $table->string('spotify')->nullable();
            $table->string('soundcloud')->nullable();
            $table->string('bandcamp')->nullable();
            $table->string('vilmeo')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('reddit')->nullable();
            $table->string('twitch')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('wechat')->nullable();
            $table->string('zoom')->nullable();
            $table->string('joinme')->nullable();
            $table->string('viber')->nullable();
            $table->string('googlehangout')->nullable();
            $table->string('voxer')->nullable();
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
        Schema::dropIfExists('contact_information');
    }
}
