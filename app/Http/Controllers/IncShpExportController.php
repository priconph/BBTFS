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

use App\Exports\BillingPaymentOrderExport;
use App\Exports\IncShpAccountingPezaLISPExport;
use App\Exports\IncShpBIRExport;
use App\Exports\IncShpOtherMonthExport;
use App\Exports\IncShpPEZAExport;
use App\Exports\IncShpProductLineExport;

class IncShpExportController extends Controller
{
    public function export_accounting_peza_lisp(Request $request)
    {
        $start = $request->txt_date_start;
        $end = $request->txt_date_end;
            	
    	$export_data_acc_peza_lisp_espt = IncomingShipmentDetails::with(['invoice_details'])->where('product_description', 'SPARE PARTS')->orWhere('product_description', 'EQUIPMENT')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_data_acc_peza_lisp_rms = IncomingShipmentDetails::with(['invoice_details'])->where('product_description', 'RAW MATS')->orWhere('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();      

    	return Excel::download(new IncShpAccountingPezaLISPExport($export_data_acc_peza_lisp_espt,$export_data_acc_peza_lisp_rms,$start,$end), '(IncShp) Accounting PEZA LISP ('.$start.' to '.$end.').xlsx');
    }

    public function export_bir_report(Request $request)
    {
        $start = $request->txt_date_start_bir_report;
        $end = $request->txt_date_end_bir_report;
            	
    	$export_data_bir_report = IncomingShipmentDetails::with(['invoice_details'])->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

    	return Excel::download(new IncShpBIRExport($export_data_bir_report,$start,$end), '(IncShp) BIR Report ('.$start.' to '.$end.').xlsx');
    }    

    public function export_other_month_billings(Request $request)
    {
        $start = $request->txt_date_start_other_month_billings;
        $end = $request->txt_date_end_other_month_billings;
            	
    	$export_data_other_month_billings = IncomingShipmentDetails::with(['invoice_details'])->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

    	return Excel::download(new IncShpOtherMonthExport($export_data_other_month_billings,$start,$end), '(IncShp) For other Month Billings ('.$start.' to '.$end.').xlsx');
    } 

    public function export_incshp_peza_report(Request $request)
    {
        $start = $request->txt_date_start_peza_report;
        $end = $request->txt_date_end_peza_report;
                
        $export_data_peza_report = IncomingShipmentDetails::with(['invoice_details'])->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        return Excel::download(new IncShpPEZAExport($export_data_peza_report,$start,$end), '(IncShp) PEZA Report ('.$start.' to '.$end.').xlsx');
    } 

    public function export_product_line_report(Request $request)
    {
        $start = $request->txt_date_start_product_line;
        $end = $request->txt_date_end_product_line;

        $export_product_line_bis = [];
        $export_product_line_cc = [];
        $export_product_line_fc = [];
        $export_product_line_fffc = [];
        $export_product_line_pps = [];
        $export_product_line_tdc = [];
        $export_product_line_ts = [];
        $export_product_line_yf = [];

        $export_product_line_BIS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng')->get();

        $export_product_line_CC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'Card Connector')->get();

        $export_product_line_FC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng')->get();

        $export_product_line_FFFC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'FUS/FRS/FMS Connector')->get();

        $export_product_line_PPS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'PPS Eng')->get();

        $export_product_line_TDC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng')->get();

        $export_product_line_TS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'Test Sockets')->get();

        $export_product_line_YF = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies')->get();

        $export_product_line_bis[] = ['export_product_line_BIS' => $export_product_line_BIS];
        $export_product_line_bis[] = ['start' => $start];
        $export_product_line_bis[] = ['end' => $end];

        $export_product_line_cc[] = ['export_product_line_CC' => $export_product_line_CC];
        $export_product_line_cc[] = ['start' => $start];
        $export_product_line_cc[] = ['end' => $end];

        $export_product_line_fc[] = ['export_product_line_FC' => $export_product_line_FC];
        $export_product_line_fc[] = ['start' => $start];
        $export_product_line_fc[] = ['end' => $end];

        $export_product_line_fffc[] = ['export_product_line_FFFC' => $export_product_line_FFFC];
        $export_product_line_fffc[] = ['start' => $start];
        $export_product_line_fffc[] = ['end' => $end];
        
        $export_product_line_pps[] = ['export_product_line_PPS' => $export_product_line_PPS];
        $export_product_line_pps[] = ['start' => $start];
        $export_product_line_pps[] = ['end' => $end];
        
        $export_product_line_tdc[] = ['export_product_line_TDC' => $export_product_line_TDC];
        $export_product_line_tdc[] = ['start' => $start];
        $export_product_line_tdc[] = ['end' => $end];
        
        $export_product_line_ts[] = ['export_product_line_TS' => $export_product_line_TS];
        $export_product_line_ts[] = ['start' => $start];
        $export_product_line_ts[] = ['end' => $end];
        
        $export_product_line_yf[] = ['export_product_line_YF' => $export_product_line_YF];
        $export_product_line_yf[] = ['start' => $start];
        $export_product_line_yf[] = ['end' => $end];

        return Excel::download(new IncShpProductLineExport($export_product_line_bis,$export_product_line_cc,$export_product_line_fc,$export_product_line_fffc,$export_product_line_pps,$export_product_line_tdc,$export_product_line_ts,$export_product_line_yf,$start,$end), '(IncShp) Product Line ('.$start.' to '.$end.').xlsx');
    }     

    public function export_payment_order_and_charging_accounts_report(Request $request)
    {
        
        $start = $request->txt_date_start_po_and_ca;
        $end = $request->txt_date_end_po_and_ca;
        $forwarder = $request->forwarder_or_broker_po_and_ca;

        $po_and_ca_data_trf = [];
        $po_and_ca_data_acctng = [];


        // Burn-In Sockets

        $export_po_and_cf_trf_BIS_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_BIS_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_BIS_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_BIS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng')->sum('total_amount');

        $export_po_and_cf_trf_BIS_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng')->sum('total_amount');

        $export_po_and_cf_trf_BIS_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng')->sum('total_amount');

        $export_po_and_cf_trf_BIS_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Burn-in Sockets')->orWhere('product_line', 'Burn-in Sockets Eng')->sum('total_amount');

        // Card Connectors

        $export_po_and_cf_trf_CC_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Card Connector');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_CC_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Card Connector');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_CC_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Card Connector');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_CC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Card Connector')->sum('total_amount');

        $export_po_and_cf_trf_CC_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Card Connector')->sum('total_amount');

        $export_po_and_cf_trf_CC_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Card Connector')->sum('total_amount');

        $export_po_and_cf_trf_CC_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->where('product_description', 'RAW MATS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Card Connector')->sum('total_amount');


        // Flexicon and Connectors

        $export_po_and_cf_trf_FC_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FC_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FC_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng')->sum('total_amount');

        $export_po_and_cf_trf_FC_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng')->sum('total_amount');

        $export_po_and_cf_trf_FC_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng')->sum('total_amount');

        $export_po_and_cf_trf_FC_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Flexicon and Connectors')->orWhere('product_line', 'Flexicon and Connectors Eng')->sum('total_amount');


        // FUS/FRS/FMS Connectors 

        $export_po_and_cf_trf_FFFC_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'FUS/FRS/FMS Connector');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FFFC_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'FUS/FRS/FMS Connector');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FFFC_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'FUS/FRS/FMS Connector');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FFFC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'FUS/FRS/FMS Connector')->sum('total_amount');

        $export_po_and_cf_trf_FFFC_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'FUS/FRS/FMS Connector')->sum('total_amount');

        $export_po_and_cf_trf_FFFC_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'FUS/FRS/FMS Connector')->sum('total_amount');

        $export_po_and_cf_trf_FFFC_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'FUS/FRS/FMS Connector')->sum('total_amount');


        // PPS  

        $export_po_and_cf_trf_PPS_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'PPS Eng');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_PPS_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'PPS Eng');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_PPS_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'PPS Eng');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_PPS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'PPS Eng')->sum('total_amount');

        $export_po_and_cf_trf_PPS_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'PPS Eng')->sum('total_amount');

        $export_po_and_cf_trf_PPS_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'PPS Eng')->sum('total_amount');

        $export_po_and_cf_trf_PPS_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'PPS Eng')->sum('total_amount');


        //TC/DC Connecters 

        $export_po_and_cf_trf_TDC_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TDC_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TDC_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TDC_ENG_total_amount = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'TC/DC Connector Eng')->sum('total_amount');

        $export_po_and_cf_trf_TDC = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng')->sum('total_amount');

        $export_po_and_cf_trf_TDC_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng')->sum('total_amount');

        $export_po_and_cf_trf_TDC_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng')->sum('total_amount');

        $export_po_and_cf_trf_TDC_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'TC/DC Connector')->orWhere('product_line', 'TC/DC Connector Eng')->sum('total_amount');


        // Test Sockets  

        $export_po_and_cf_trf_TS_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Test Sockets');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TS_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Test Sockets');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TS_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Test Sockets');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_TS = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Test Sockets')->sum('total_amount');

        $export_po_and_cf_trf_TS_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Test Sockets')->sum('total_amount');

        $export_po_and_cf_trf_TS_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Test Sockets')->sum('total_amount');

        $export_po_and_cf_trf_TS_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Test Sockets')->sum('total_amount');


        // Y-Flex 

        $export_po_and_cf_trf_YF_eqptmnt = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies');

        }])->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_YF_mats = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies');

        }])->where('product_description', 'RAW MATS')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_YF_sppls = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies');

        }])->where('product_description', 'SUPPLIES')->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_YF = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies')->sum('total_amount');

        $export_po_and_cf_trf_YF_total_amount_eqptmnt = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'EQUIPMENT')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies')->sum('total_amount');

        $export_po_and_cf_trf_YF_total_amount_mats = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'RAW MATS')->orWhere('product_description', 'SPARE PARTS')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies')->sum('total_amount');

        $export_po_and_cf_trf_YF_total_amount_suppls = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->where('product_description', 'SUPPLIES')->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'YFLEX')->orWhere('product_line', 'YFLEX Supplies')->sum('total_amount');


        // Facility

        $export_po_and_cf_trf_FAC = IncomingShipmentDetails::with(['invoice_details' => function($query){

            $query->where('product_line', 'Facility');

        }])->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc')->get();

        $export_po_and_cf_trf_FAC_total_amount = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('arrival_date_pricon', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->where('product_line', 'Facility')->sum('total_amount');


        // Shipment Details 

        $export_data_po_and_ca = InvoiceDetails::with(['shipment_details' => function($query) use($start,$end,$forwarder){

            $query->whereBetween('shipment_date', [$start, $end])->orderBy('shipment_details_id', 'desc');

        }])->where('forwarder_or_broker', $forwarder)->get();

        $unique_cut_off_date = $export_data_po_and_ca->unique('cut_off_date');
        $payment_order_date = $unique_cut_off_date[0]->shipment_details->cut_off_date;

        $unique_due_date = $export_data_po_and_ca->unique('due_date');
        $payment_order_due_date = $unique_due_date[0]->shipment_details->due_date;        

        $po_and_ca_data_trf[] = ['export_data_po_and_ca' => $export_data_po_and_ca]; 

        $po_and_ca_data_trf[] = ['start' => $start];
        $po_and_ca_data_trf[] = ['end' => $end];
        $po_and_ca_data_trf[] = ['forwarder' => $forwarder];
        $po_and_ca_data_trf[] = ['payment_order_date' => $payment_order_date];
        $po_and_ca_data_trf[] = ['payment_order_due_date' => $payment_order_due_date];
        $po_and_ca_data_trf[] = ['export_po_and_cf_trf_BIS_eqptmnt' => $export_po_and_cf_trf_BIS_eqptmnt];

        $po_and_ca_data_acctng[] = ['export_data_po_and_ca' => $export_data_po_and_ca]; 

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_BIS_eqptmnt' => $export_po_and_cf_trf_BIS_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_BIS_mats' => $export_po_and_cf_trf_BIS_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_BIS_sppls' => $export_po_and_cf_trf_BIS_sppls];

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_CC_eqptmnt' => $export_po_and_cf_trf_CC_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_CC_mats' => $export_po_and_cf_trf_CC_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_CC_sppls' => $export_po_and_cf_trf_CC_sppls];

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FC_eqptmnt' => $export_po_and_cf_trf_FC_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FC_mats' => $export_po_and_cf_trf_FC_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FC_sppls' => $export_po_and_cf_trf_FC_sppls];

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FFFC_eqptmnt' => $export_po_and_cf_trf_FFFC_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FFFC_mats' => $export_po_and_cf_trf_FFFC_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FFFC_sppls' => $export_po_and_cf_trf_FFFC_sppls];

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_PPS_eqptmnt' => $export_po_and_cf_trf_PPS_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_PPS_mats' => $export_po_and_cf_trf_PPS_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_PPS_sppls' => $export_po_and_cf_trf_PPS_sppls];

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TDC_eqptmnt' => $export_po_and_cf_trf_TDC_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TDC_mats' => $export_po_and_cf_trf_TDC_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TDC_sppls' => $export_po_and_cf_trf_TDC_sppls];        

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TS_eqptmnt' => $export_po_and_cf_trf_TS_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TS_mats' => $export_po_and_cf_trf_TS_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_TS_sppls' => $export_po_and_cf_trf_TS_sppls];      
        
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_YF_eqptmnt' => $export_po_and_cf_trf_YF_eqptmnt];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_YF_mats' => $export_po_and_cf_trf_YF_mats];
        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_YF_sppls' => $export_po_and_cf_trf_YF_sppls]; 

        $po_and_ca_data_acctng[] = ['export_po_and_cf_trf_FAC' => $export_po_and_cf_trf_FAC];          

        $po_and_ca_data_acctng[] = ['start' => $start];
        $po_and_ca_data_acctng[] = ['end' => $end];
        $po_and_ca_data_acctng[] = ['forwarder' => $forwarder];

        return Excel::download(new BillingPaymentOrderExport($po_and_ca_data_trf,$po_and_ca_data_acctng,$start,$end), 'BILLING - PAYMENT ORDER and CHARGING ACCOUNTS ('.$start.' to '.$end.').xlsx');
    }               
}
