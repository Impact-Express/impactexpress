<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('user_id');
            $table->integer('status_id')->default(1);
            $table->integer('carrier_id');
            $table->integer('service_id');
            $table->integer('account_number_id')->nullable();
            $table->integer('documents');
            $table->string('description')->nullable();
            $table->decimal('price');
            $table->decimal('declared_value');
            $table->string('shipment_ref')->nullable();
            $table->string('airwaybill_number')->nullable();
            $table->text('label_image')->nullable();
            $table->date('date');

            $table->string('sender_contact_title');
            $table->string('sender_contact_first_name');
            $table->string('sender_contact_last_name');
            $table->string('sender_company_name');
            $table->string('sender_home_phone')->nullable();;
            $table->string('sender_work_phone')->nullable();;
            $table->string('sender_mobile_phone')->nullable();;
            $table->string('sender_address_line_1');
            $table->string('sender_address_line_2')->nullable();;
            $table->string('sender_address_line_3')->nullable();;
            $table->string('sender_town');
            $table->string('sender_country_id');
            $table->string('sender_postcode');

            $table->string('recipient_contact_title');
            $table->string('recipient_contact_first_name');
            $table->string('recipient_contact_last_name');
            $table->string('recipient_company_name');
            $table->string('recipient_home_phone')->nullable();;
            $table->string('recipient_work_phone')->nullable();;
            $table->string('recipient_mobile_phone')->nullable();;
            $table->string('recipient_address_line_1');
            $table->string('recipient_address_line_2')->nullable();;
            $table->string('recipient_address_line_3')->nullable();;
            $table->string('recipient_town');
            $table->string('recipient_country_id');
            $table->string('recipient_postcode');

            $table->boolean('is_remote_area')->default(false);

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
        Schema::dropIfExists('shipments');
    }
}
