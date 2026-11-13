<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_details', function (Blueprint $table) {
            $table->bigIncrements('shipment_details_id');
            $table->string('particulars');  
            $table->string('arrival_date_pricon');
            $table->string('shipment_date');
            $table->string('invoice_date');
            $table->string('cut_off_date');
            $table->string('due_date');
            $table->string('gross_weight');  
            $table->string('charge_weight'); 
            $table->string('flt');
            $table->string('product_description');
            $table->string('qty_per_pcs');                   
            $table->string('shipper');
            $table->string('origin');
            $table->string('hawb_no_or_bl_no');
            $table->string('import_permit_no');  
            $table->string('invoice_no');
            $table->string('suppliers_invoice_value_usd');
            $table->string('term_of_payment');
            $table->string('forwarder_or_broker');
            $table->string('forwarder_broker_billing_invoice_no');
            $table->string('product_line');
            $table->string('division');
            $table->string('expense_item');
            $table->string('total_frt_php'); 
            $table->string('total_frt_usd');
            $table->string('broker_total_local_handling');   
            $table->string('total_duties_and_taxes');
            $table->string('remarks');     
            $table->string('additional_item');
            $table->string('total_amount');
            $table->unsignedBigInteger('prepared_by');
            $table->unsignedBigInteger('checked_by');
            $table->unsignedBigInteger('approved_by');   
            $table->unsignedTinyInteger('status')->default(0)->comment = '0-To be Filled up, 1-For Approval, 2-Approved,';            
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by');                                                
            $table->timestamps();
            $table->unsignedTinyInteger('logdel')->default(0)->comment = '0-Active, 1-Inactive';  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_details');
    }
}
