<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\IncomingShipmentDetails;

class InvoiceDetails extends Model
{
    protected $table = 'invoice_details';
    protected $connection = 'mysql';  

    public function shipment_details(){
    	return $this->hasOne(IncomingShipmentDetails::class, 'shipment_details_id', 'fk_shipment_details_id');
    }     
}
