<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DataTables;
use Auth;
use Mail;

use App\Model\RapidXUser;
use App\Model\IncomingShipmentDetails;
use App\Model\InvoiceDetails;

class IncomingShipmentController extends Controller
{
    public function view_incoming_shipment_details_table(Request $request){

		session_start();

		$rapidx_user_id = $_SESSION['rapidx_user_id'];

		$incoming_shipment_details = IncomingShipmentDetails::with(['invoice_details'])->where('logdel', '!=', 1)->get();

		return DataTables::of($incoming_shipment_details)
		->addColumn('action',function($incoming_shipment_details) use($rapidx_user_id){

			$result = "";

            switch ($incoming_shipment_details->status) 
            {			
                case 0:
                {
                    if ($rapidx_user_id == 45) {
                        //view Incoming Shipment Details
                        $result .= ' <button type="button" class="btn btn-sm btn-info btn-view-incshipmentform" data-toggle="modal" data-target="#modalViewIncShippingDetails" title="View Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-eye"></i></button>';

                        //Approve Maintenance Checksheet
                        $result .= ' <button type="button" class="btn btn-sm btn-success btn-approve-incshipmentform-sectionhead" data-toggle="modal" data-target="#modalCheckIncShippingDetails" title="Approve Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-check-circle"></i></button>';                         
                        break;     
                    }else{
                        //view Incoming Shipment Details
                        $result .= ' <button type="button" class="btn btn-sm btn-info btn-view-incshipmentform" data-toggle="modal" data-target="#modalViewIncShippingDetails" title="View Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-eye"></i></button>';  
                        break;       
                    }          
                }
                case 1:
                {
                    if ($rapidx_user_id == 15) {
                        //view Incoming Shipment Details
                        $result .= ' <button type="button" class="btn btn-sm btn-info btn-view-incshipmentform" data-toggle="modal" data-target="#modalViewIncShippingDetails" title="View Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-eye"></i></button>';

                        //Approve Maintenance Checksheet
                        $result .= ' <button type="button" class="btn btn-sm btn-success btn-approve-incshipmentform-genmanager" data-toggle="modal" data-target="#modalCheckIncShippingDetailsGenManager" title="Approve Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-check-circle"></i></button>';                         
                        break;     
                    }else{
                        //view Incoming Shipment Details
                        $result .= ' <button type="button" class="btn btn-sm btn-info btn-view-incshipmentform" data-toggle="modal" data-target="#modalViewIncShippingDetails" title="View Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-eye"></i></button>';  
                        break;                          
                    }                           
                }
                default:
                {
                    //view Incoming Shipment Details
                    $result .= ' <button type="button" class="btn btn-sm btn-info btn-view-incshipmentform" data-toggle="modal" data-target="#modalViewIncShippingDetails" title="View Incoming Shipment Form" incshipmentform-id="'.$incoming_shipment_details->shipment_details_id.'"><i class="fa fa-eye"></i></button>';                    
                }
	    	}

	    	return $result;  
		})
        ->addColumn('status',function($incoming_shipment_details){

            $result = "";

            switch ($incoming_shipment_details->status) 
            {
                case 0:
                {
                    $result = '<span class="badge badge-pill badge-primary">For Checking</span>';
                    break;
                } 

                case 1:
                {
                    $result = '<span class="badge badge-pill badge-warning">For Approval</span>';
                    break;
                }    

                case 2:
                {
                    $result = '<span class="badge badge-pill badge-success">Approved</span>';
                    break;
                }  

                case 3:
                {
                    $result = '<span class="badge badge-pill badge-danger">Disapproved</span>';
                    break;
                }                  

            }      
            return $result;
        })        
		->addColumn('particulars',function($incoming_shipment_details){

			$result = $incoming_shipment_details->particulars;

			return $result;
		})
		->addColumn('shipment_date',function($incoming_shipment_details){

			$result = $incoming_shipment_details->shipment_date;

			return $result;
		})	
		->addColumn('product_description',function($incoming_shipment_details){

			$result = $incoming_shipment_details->product_description;

			return $result;
		})					
		->addColumn('qty_per_pcs',function($incoming_shipment_details){

			$result = $incoming_shipment_details->qty_per_pcs;

			return $result;
		})			
		->addColumn('origin',function($incoming_shipment_details){

			$result = $incoming_shipment_details->origin;

			return $result;
		})			
		->addColumn('invoice_no',function($incoming_shipment_details){

			$result = $incoming_shipment_details->invoice_details->invoice_no;

			return $result;
		})			
        ->rawColumns(['status','action','particulars','shipment_date','product_description','qty_per_pcs','origin','invoice_no'])
        ->make(true);
    }

    public function add_incoming_shipment_details(Request $request){

		session_start();

		$rapidx_user_id = $_SESSION['rapidx_user_id'];   

        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $addtnl_items = $request->add_additional_item;

        $comma_separated = implode(",", $addtnl_items);

        $validator = Validator::make($data, [
            'selParticulars' => ['required', 'string', 'max:255'],    
            'arrival_date_pricon' => ['required', 'string', 'max:255'],   
            'shipment_date' => ['required', 'string', 'max:255'],     
            'invoice_date' => ['required', 'string', 'max:255'],    
            'cut_off_date' => ['required', 'string', 'max:255'],   
            'due_date' => ['required', 'string', 'max:255'], 
            'gross_weight' => ['required', 'string', 'max:255'],    
            'charge_weight' => ['required', 'string', 'max:255'],   
            'flt' => ['required', 'string', 'max:255'], 
            'selProductDescription' => ['required', 'string', 'max:255'],    
            'qty_pcs' => ['required', 'string', 'max:255'],   
            'selShipper' => ['required', 'string', 'max:255'],  
            'selOrigin' => ['required', 'string', 'max:255'],    
            'hawb_bl_no' => ['required', 'string', 'max:255'],   
            'import_permit_no' => ['required', 'string', 'max:255'], 
			'invoice_no' => ['required', 'string', 'max:255'],    
            'suppliers_invoice_value_usd' => ['required', 'string', 'max:255'],   
            'selTermOfPayment' => ['required', 'string', 'max:255'],     
            'selForwarderOrBroker' => ['required', 'string', 'max:255'],    
            'forwarder_broker_billing_invoiceno' => ['required', 'string', 'max:255'],   
            'selProductLine' => ['required', 'string', 'max:255'], 
            'selDivision' => ['required', 'string', 'max:255'],    
            'selExpenseItem' => ['required', 'string', 'max:255'],   
            'total_frt_php' => ['required', 'string', 'max:255'], 
            'total_frt_usd' => ['required', 'string', 'max:255'],    
            'broker_total_local_handling' => ['required', 'string', 'max:255'],   
            'total_duties_and_taxes' => ['required', 'string', 'max:255'],  
            'selRemarks' => ['required', 'string', 'max:255'],    
            'total_amount' => ['required', 'string', 'max:255'],               
        ]);

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else{
            DB::beginTransaction();

            try{
                $incoming_shipment_id = IncomingShipmentDetails::insertGetId([
                	'particulars' => $request->selParticulars,
                    'arrival_date_pricon' => $request->arrival_date_pricon,
                    'shipment_date' => $request->shipment_date,
                    'invoice_date' => $request->invoice_date,
                    'cut_off_date' => $request->cut_off_date,
                    'due_date' => $request->due_date,
                    'gross_weight' => $request->gross_weight,
                    'charge_weight' => $request->charge_weight,
                    'flt' => $request->flt,
                    'product_description' => $request->selProductDescription,
                    'qty_per_pcs' => $request->qty_pcs,
                    'shipper' => $request->selShipper,
                    'origin' => $request->selOrigin,
                    'hawb_no_or_bl_no' => $request->hawb_bl_no,
                    'import_permit_no' => $request->import_permit_no,  
                    'prepared_by' => $rapidx_user_id,                                             
                    'status' => 0,
                    'created_by' => $rapidx_user_id,
                    'created_at' => date('Y-m-d H:i:s'),  
                    'logdel' => 0,                   
                ]);

                InvoiceDetails::insert([
                    'fk_shipment_details_id' => $incoming_shipment_id,
                    'invoice_no' => $request->invoice_no,
                    'suppliers_invoice_value_usd' => $request->suppliers_invoice_value_usd,
                    'term_of_payment' => $request->selTermOfPayment,
                    'forwarder_or_broker' => $request->selForwarderOrBroker,
                    'forwarder_broker_billing_invoiceno' => $request->forwarder_broker_billing_invoiceno,
                    'product_line' => $request->selProductLine,
                    'division' => $request->selDivision,            
                    'expense_item' => $request->selExpenseItem,
                    'total_frt_php' => $request->total_frt_php,
                    'total_frt_usd' => $request->total_frt_usd,
                    'broker_total_local_handling' => $request->broker_total_local_handling,
                    'total_duties_and_taxes' => $request->total_duties_and_taxes,
                    'remarks' => $request->selRemarks, 
                    'other_remarks_details' => $request->other_remarks, 
                    'additional_item' =>  $comma_separated,
                    'total_amount' => $request->total_amount,
                    'logdel' => 0,  
                ]);

                DB::commit();
               
                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }
        }
    }

    // Get Incoming Shipment Details By Id
    public function get_incshipmentdetails_by_id(Request $request)
    {
        $incshipdetes = IncomingShipmentDetails::with(['invoice_details'])->where('shipment_details_id', $request->shipment_details_id)->get();

        if(count($incshipdetes) > 0){
        	return response()->json(['result' => 1, 'incshipdetes' => $incshipdetes]);
        }else{
        	return response()->json(['result' => 2]);
        }
    }      

    public function sect_head_approve_incshipmentdetails(Request $request)
    {
        session_start();

        $rapidx_user_id = $_SESSION['rapidx_user_id'];

        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $validator = Validator::make($data, [
            'sect_head_approve_incshippingform_id' => ['string', 'max:255'], 
            'sect_head_approve_incshippingform_status' => ['string', 'max:255'],               
        ]);     

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else
        {
            DB::beginTransaction();

            try{

               IncomingShipmentDetails::where('shipment_details_id', $request->sect_head_approve_incshippingform_id)
               ->update([
                    'status' => $request->sect_head_approve_incshippingform_status,
                    'last_updated_by' => $rapidx_user_id,
                    'checked_by' => $rapidx_user_id,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);                    

                DB::commit();     

                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }                  
        }
    }

    public function gen_manager_approve_incshipmentdetails(Request $request)
    {
        session_start();

        $rapidx_user_id = $_SESSION['rapidx_user_id'];

        date_default_timezone_set('Asia/Manila');

        $data = $request->all();

        $validator = Validator::make($data, [
            'gen_manager_approve_incshippingform_id' => ['string', 'max:255'], 
            'gen_manager_approve_incshippingform_status' => ['string', 'max:255'],               
        ]);     

        if ($validator->fails()) {
            return response()->json(['result' => '0', 'error' => $validator->messages()]);
        }
        else
        {
            DB::beginTransaction();

            try{

               IncomingShipmentDetails::where('shipment_details_id', $request->gen_manager_approve_incshippingform_id)
               ->update([
                    'status' => $request->gen_manager_approve_incshippingform_status,
                    'last_updated_by' => $rapidx_user_id,
                    'approved_by' => $rapidx_user_id,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);                    

                DB::commit();     

                return response()->json(['result' => "1"]);
            }
            catch(\Exception $e) {
                DB::rollback();
                // throw $e;
                return response()->json(['result' => "0"]);
            }                  
        }
    }
}
