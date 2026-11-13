<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\InvoiceDetails;

class IncomingShipmentDetails extends Model
{
    protected $table = 'shipment_details';
    protected $connection = 'mysql';  

    public function invoice_details(){
    	return $this->hasOne(InvoiceDetails::class, 'fk_shipment_details_id', 'shipment_details_id');
    }    
}
