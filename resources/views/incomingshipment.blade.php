@extends('layouts.user_layout')

@section('title', 'Blank')

@section('content_page')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Billing Between Traffic and Finance System</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">BBTFS</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Shipment Details</h3>
            </div>

            <!-- Start Page Content -->
            <div class="card-body">

              <div class="float-sm-right">
                <button type="button" class="btn btn-sm btn-success" id="btnNewIncShippingDetes" data-toggle="modal" data-target="#modalNewIncShippingDetails"><i class="fa fa-plus"></i> Incoming Shipment Details</button>
              </div> 

              <div class="dt-responsive table-responsive">
                <br>
                <table id="tbl_shipment_details" class="table table-striped table-bordered" style="width: 100%; font-size: 90%;">
                  <thead>
                    <tr>
                      <th>Status</th>
                      <th>Particulars</th>
                      <th>Shipment Date</th>
                      <th>Product Description</th>
                      <th>Qty / Pcs.</th>
                      <th>Origin</th>
                      <th>Invoice No.</th>
                      <th>Action</th>                           
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- !-- End Page Content -->

          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Add Incoming Shipment Details Modal -->
<div class="modal fade" id="modalNewIncShippingDetails" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> New Incoming Shipment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="POST" id="formAddNewIncShippingDetails">
      @csrf
      <div class="modal-body"> 
        <div class="row">
          <div class="col-sm-6">

            <!-- Particulars -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Particulars</label>
                <select class="form-control" id="particulars" name="selParticulars">
                  <option selected disabled>-- Select One --</option>
                  <option value="Import">Import</option>
                  <option value="Export">Export</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Arrival Date (Pricon)</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="arrival_date_pricon" id="txtArrivalDatePricon" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Shipment Date</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="shipment_date" id="txtShipmentDate" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Invoice Date</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="invoice_date" id="txtInvoiceDate" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Cut-off Date</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="cut_off_date" id="txtCutOffDate" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Due Date</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="due_date" id="txtDueDate" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Gross Weight</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="gross_weight" id="txtGrossWeight" placeholder="Gross Weight" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Charge Weight</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="charge_weight" id="txtChargeWeight" placeholder="Charge Weight" value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">FLT</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="flt" id="txtFLT" placeholder="FLT" value="" maxlength="50" required="">
                </div>
            </div>

            <!-- Product Description -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Product Description</label>
                <select class="form-control" id="product_description" name="selProductDescription">
                  <option selected disabled>-- Select One --</option>
                  <option value="EQUIPMENT">EQUIPMENT</option>
                  <option value="RAW MATS">RAW MATS</option>
                  <option value="SPARE PARTS">SPARE PARTS</option>
                  <option value="SUPPLIES">SUPPLIES</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Qty / Pcs.</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="qty_pcs" id="txtQtyPcs" placeholder="Qty / Pcs." min="0" value="0" step="0.01" maxlength="50" required="">
                </div>
            </div>

            <!-- Shipper -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Shipper</label>
                <select class="form-control" id="shipper" name="selShipper">
                  <option selected disabled>-- Select One --</option>
                  <option value="NIPPON EXP. NECL">NIPPON EXP. NECL</option>
                  <option value="YEC">YEC</option>
                  <option value="AYE">AYE</option>
                  <option value="YEH">YEH</option>
                  <option value="COFAN CN">COFAN CN</option>
                  <option value="LAPIS">LAPIS</option>
                  <option value="MIKURO">MIKURO</option>
                  <option value="G-SHANK">G-SHANK</option>
                  <option value="REPTECH">REPTECH</option>
                  <option value="YEU">YEU</option>
                  <option value="MITSUI">MITSUI</option>
                  <option value="DYNACAST">DYNACAST</option>
                  <option value="TSMC">TSMC</option>
                  <option value="TOP STAR">TOP STAR</option>
                  <option value="YIELD">YIELD</option>
                  <option value="COFAN USA">COFAN USA</option>
                  <option value="ORION">ORION</option>
                  <option value="YI TONG">YI TONG</option>
                  <option value="JC TOOL">JC TOOL</option>
                  <option value="SHEN CHENG">SHEN CHENG</option>                                                                
                </select>
              </div>
            </div>

            <!-- Origin -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Origin</label>
                <select class="form-control" id="origin" name="selOrigin">
                  <option selected disabled>-- Select One --</option>
                  <option value="HONG KONG">HONG KONG</option>
                  <option value="JAPAN">JAPAN</option>
                  <option value="KOREA">KOREA</option>
                  <option value="CHINA">CHINA</option>
                  <option value="TAIWAN">TAIWAN</option>
                  <option value="USA">USA</option>
                  <option value="SINGAPORE">SINGAPORE</option>
                  <option value="MALAYSIA">MALAYSIA</option>                                                               
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">HAWB No. / BL No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="hawb_bl_no" id="txtHAWBBLNo" placeholder="HAWB NO. / BL NO." value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Import Permit No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="import_permit_no" id="txtImportPermitNo" placeholder="Import Permit No." value="" maxlength="50" required="">
                </div>
            </div>

          </div>
          <div class="col-sm-6">

            <div class="form-group">
              <label class="col-sm-10 control-label">Invoice No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="invoice_no" id="txtInvoiceNo" placeholder="Invoice No." value="" maxlength="50" required="">
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Supplier's Invoice Value</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>               
                      <input type="number" class="form-control" name="suppliers_invoice_value_usd" id="txtSuppliersInvoiceValueUSD" placeholder="Supplier's Invoice Value (US$)" min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

            <!-- Term of Payment -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Term of Payment</label>
                <select class="form-control" id="term_of_payment" name="selTermOfPayment">
                  <option selected disabled>-- Select One --</option>
                  <option value="DDU">DDU</option>
                  <option value="FOB">FOB</option>                                                            
                </select>
              </div>
            </div>

            <!-- Forwarder / Broker -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Forwarder / Broker</label>
                <select class="form-control" id="forwarder_or_broker" name="selForwarderOrBroker">
                  <option selected disabled>-- Select One --</option>
                  <option value="LOGISTICS SINGAPORE PTE. LTD.">LOGISTICS SINGAPORE PTE. LTD.</option>
                  <option value="CEVA LOGISTICS PHILIPPINES INC.">CEVA LOGISTICS PHILIPPINES INC.</option>
                  <option value="FEDERAL EXPRESS PACIFIC LLC.">FEDERAL EXPRESS PACIFIC LLC.</option>
                  <option value="AGILITY INTERNATIONAL LOGISTICS INC.">AGILITY INTERNATIONAL LOGISTICS INC.</option>
                  <option value="DHL EXPRESS">DHL EXPRESS</option>
                  <option value="NIPPON EXPRESS PHIL.">NIPPON EXPRESS PHIL.</option>
                  <option value="ASSOCIATED FREIGHT CONSOLIDATORS INC.">ASSOCIATED FREIGHT CONSOLIDATORS INC.</option>
                  <option value="UPS DELBROS">UPS DELBROS</option>    
                  <option value="UPCB INSURANCE">UPCB INSURANCE</option>     
                  <option value="OVAL BROKERAGE INC.">OVAL BROKERAGE INC.</option>     
                  <option value="MANILA INT'L FREIGHT FORWARDERS, INC.">MANILA INT'L FREIGHT FORWARDERS, INC.</option>                                                                
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Forwarders / Broker Billing invoice No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="forwarder_broker_billing_invoiceno" id="txtForwarderBrokerBillingInvoiceNo" placeholder="Forwarders / Broker Billing invoice No." value="" maxlength="50" required="">
                </div>
            </div>

            <!-- Product Line -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Product Line</label>
                <select class="form-control" id="product_line" name="selProductLine">
                  <option selected disabled>-- Select One --</option>
                  <option value="Card Connector">Card Connector</option>
                  <option value="TC/DC Connector">TC/DC Connector</option>
                  <option value="Flexicon and Connectors">Flexicon and Connectors</option>
                  <option value="Burn-in Sockets">Burn-in Sockets</option>
                  <option value="Test Sockets">Test Sockets(incl. Probe)</option>
                  <option value="PPS Eng">PPS Eng'g</option>
                  <option value="YFLEX">YFLEX</option>
                  <option value="FUS/FRS/FMS Connector">FUS/FRS/FMS Connector</option>    
                  <option value="Flexicon and Connectors Eng">Flexicon and Connectors Eng'g</option>     
                  <option value="Facility">Facility</option>     
                  <option value="YFLEX Supplies">YFLEX Supplies</option>
                  <option value="Burn-in Sockets Eng">Burn-in Sockets Eng'g</option>   
                  <option value="TC/DC Connector Eng">TC/DC Connector Eng'g</option>                                                                   
                </select>
              </div>
            </div>

            <!-- Division -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Division</label>
                <select class="form-control" id="division" name="selDivision">
                  <option selected disabled>-- Select One --</option>
                  <option value="CN">CN</option>
                  <option value="TS">TS</option>
                  <option value="PP">PP</option>
                  <option value="YF">YF</option>
                  <option value="Admin">Admin</option>                                                              
                </select>
              </div>
            </div>

            <!-- Expense Item -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Expense Item</label>
                <select class="form-control" id="expense_item" name="selExpenseItem">
                  <option selected disabled>-- Select One --</option>
                  <option value="Freight-in">Freight-in</option>
                  <option value="Equipment">Equipment</option>
                  <option value="R0014 Machineries">R0014 Machineries</option>
                  <option value="Material Handling">Material Handling</option>                                                           
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total FRT.</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="total_frt_php" id="txtTotalFRTPHP" placeholder="Total FRT." min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total FRT.</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>               
                      <input type="number" class="form-control" name="total_frt_usd" id="txtTotalFRTUSD" placeholder="Total FRT." min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Broker Total Local Handling</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="broker_total_local_handling" id="txtBrokerTotalLocalHandling" placeholder="Broker Total Local Handling" min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total Duties and Taxes</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="total_duties_and_taxes" id="txtTotalDutiesAndTaxes" placeholder="Total Duties and Taxes" min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

            <!-- Remarks -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Remarks</label>
                <select class="form-control" id="remarks" name="selRemarks">
                  <option selected disabled>-- Select One --</option>
                  <option value="Complete Documents">Complete Documents</option>
                  <option value="Incomplete Documents">Incomplete Documents</option>
                  <option value="Others">Others</option>                                                          
                </select>
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-primary" id="btnRemarksBack"><i class="fas fa-arrow-left"></i></button>                
                    <input type="hidden" class="form-control" name="other_remarks" id="txtOtherRemarks" placeholder="Others" value="" maxlength="50" required="">
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="col-sm-10 control-label">Additional Item</label>
              <div class="row">
                <table class="table table-bordered" id="dynamic_field">
                  <tr> 
                    <td width="100px" style="border-style:hidden;">
                        <button type="button" class="btn btn-success" name="add" id="add"><i class="fa fa-plus"></i></button>
                    </td>
                    <td style="border-style:hidden;">
                        <input type="text" class="form-control" name="add_additional_item[]" id="txtAddAdditionalItem" placeholder="" value="" maxlength="50" required="">
                    </td>
                  </tr>               
                </table>              
              </div>              
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total Amount</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱ / $</span>               
                      <input type="number" class="form-control" name="total_amount" id="txtTotalAmount" placeholder="Total Amount" min="0" value="0" step="0.01" maxlength="50" required="">
                  </div>   
                </div>
            </div>

          </div>          
        </div>
      </div> 

      <div class="modal-footer">
        <button type="submit" id="btnSubmitIncomingShipment" class="btn btn-sm btn-primary"><i id="ibtnSubmitIncomingShipmentIcon" class="fa fa-plus"></i> Submit</button>
      </div>
     
      </form>
    </div>
  </div>
</div>


<!-- View Incoming Shipment Details Modal -->
<div class="modal fade" id="modalViewIncShippingDetails" data-backdrop="static">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-plus"></i> New Incoming Shipment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="formAViewIncShippingDetails">
      @csrf
      <div class="modal-body"> 
        <div class="row">
          <div class="col-sm-6">

            <input type="hidden" class="form-control" name="incomingshipment_id" id="txtViewIncomingShipmentDetailsId">

            <!-- Particulars -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Particulars</label>
                <select class="form-control" id="view_particulars" name="ViewselParticulars" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="Import">Import</option>
                  <option value="Export">Export</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Arrival Date (Pricon)</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="view_arrival_date_pricon" id="txtViewArrivalDatePricon" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Shipment Date</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="view_shipment_date" id="txtViewShipmentDate" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Invoice Date</label>
                <div class="col-sm-12">
                  <input type="date" class="form-control" name="view_invoice_date" id="txtViewInvoiceDate" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Cut-off Date</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_cut_off_date" id="txtViewCutOffDate" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Due Date</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_due_date" id="txtViewDueDate" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Gross Weight</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_gross_weight" id="txtViewGrossWeight" placeholder="Gross Weight" value="" maxlength="50" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Charge Weight</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_charge_weight" id="txtViewChargeWeight" placeholder="Charge Weight" value="" maxlength="50" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">FLT</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_flt" id="txtViewFLT" placeholder="FLT" value="" maxlength="50" readonly>
                </div>
            </div>

            <!-- Product Description -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Product Description</label>
                <select class="form-control" id="view_product_description" name="ViewselProductDescription" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="EQUIPMENT">EQUIPMENT</option>
                  <option value="RAW MATS">RAW MATS</option>
                  <option value="SPAREPARTS">SPAREPARTS</option>
                  <option value="SUPPLIES">SUPPLIES</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Qty / Pcs.</label>
                <div class="col-sm-12">
                  <input type="number" class="form-control" name="view_qty_pcs" id="txtViewQtyPcs" placeholder="Qty / Pcs." min="0" value="0" step="0.01" maxlength="50" readonly>
                </div>
            </div>

            <!-- Shipper -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Shipper</label>
                <select class="form-control" id="view_shipper" name="ViewselShipper" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="NIPPON EXP. NECL">NIPPON EXP. NECL</option>
                  <option value="YEC">YEC</option>
                  <option value="AYE">AYE</option>
                  <option value="YEH">YEH</option>
                  <option value="COFAN CN">COFAN CN</option>
                  <option value="LAPIS">LAPIS</option>
                  <option value="MIKURO">MIKURO</option>
                  <option value="G-SHANK">G-SHANK</option>
                  <option value="REPTECH">REPTECH</option>
                  <option value="YEU">YEU</option>
                  <option value="MITSUI">MITSUI</option>
                  <option value="DYNACAST">DYNACAST</option>
                  <option value="TSMC">TSMC</option>
                  <option value="TOP STAR">TOP STAR</option>
                  <option value="YIELD">YIELD</option>
                  <option value="COFAN USA">COFAN USA</option>
                  <option value="ORION">ORION</option>
                  <option value="YI TONG">YI TONG</option>
                  <option value="JC TOOL">JC TOOL</option>
                  <option value="SHEN CHENG">SHEN CHENG</option>                                                                
                </select>
              </div>
            </div>

            <!-- Origin -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Origin</label>
                <select class="form-control" id="view_origin" name="ViewselOrigin" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="HONG KONG">HONG KONG</option>
                  <option value="JAPAN">JAPAN</option>
                  <option value="KOREA">KOREA</option>
                  <option value="CHINA">CHINA</option>
                  <option value="TAIWAN">TAIWAN</option>
                  <option value="USA">USA</option>
                  <option value="SINGAPORE">SINGAPORE</option>
                  <option value="MALAYSIA">MALAYSIA</option>                                                               
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">HAWB No. / BL No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_hawb_bl_no" id="txtViewHAWBBLNo" placeholder="HAWB NO. / BL NO." value="" maxlength="50" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Import Permit No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_import_permit_no" id="txtViewImportPermitNo" placeholder="Import Permit No." value="" maxlength="50" readonly>
                </div>
            </div>

          </div>
          <div class="col-sm-6">

            <div class="form-group">
              <label class="col-sm-10 control-label">Invoice No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_invoice_no" id="txtViewInvoiceNo" placeholder="Invoice No." value="" maxlength="50" readonly>
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Supplier's Invoice Value</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>               
                      <input type="number" class="form-control" name="view_suppliers_invoice_value_usd" id="txtViewSuppliersInvoiceValueUSD" placeholder="Supplier's Invoice Value (US$)" min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

            <!-- Term of Payment -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Term of Payment</label>
                <select class="form-control" id="view_term_of_payment" name="ViewselTermOfPayment" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="DDU">DDU</option>
                  <option value="FOB">FOB</option>                                                            
                </select>
              </div>
            </div>

            <!-- Forwarder / Broker -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Forwarder / Broker</label>
                <select class="form-control" id="view_forwarder_or_broker" name="ViewselForwarderOrBroker" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="LOGISTICS SINGAPORE PTE. LTD.">LOGISTICS SINGAPORE PTE. LTD.</option>
                  <option value="CEVA LOGISTICS PHILIPPINES INC.">CEVA LOGISTICS PHILIPPINES INC.</option>
                  <option value="FEDERAL EXPRESS PACIFIC LLC.">FEDERAL EXPRESS PACIFIC LLC.</option>
                  <option value="AGILITY INTERNATIONAL LOGISTICS INC.">AGILITY INTERNATIONAL LOGISTICS INC.</option>
                  <option value="DHL EXPRESS">DHL EXPRESS</option>
                  <option value="NIPPON EXPRESS PHIL.">NIPPON EXPRESS PHIL.</option>
                  <option value="ASSOCIATED FREIGHT CONSOLIDATORS INC.">ASSOCIATED FREIGHT CONSOLIDATORS INC.</option>
                  <option value="UPS DELBROS">UPS DELBROS</option>    
                  <option value="UPCB INSURANCE">UPCB INSURANCE</option>     
                  <option value="OVAL BROKERAGE INC.">OVAL BROKERAGE INC.</option>     
                  <option value="MANILA INT'L FREIGHT FORWARDERS, INC.">MANILA INT'L FREIGHT FORWARDERS, INC.</option>                                                                
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Forwarders / Broker Billing invoice No.</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="view_forwarder_broker_billing_invoiceno" id="txtViewForwarderBrokerBillingInvoiceNo" placeholder="Forwarders / Broker Billing invoice No." value="" maxlength="50" readonly>
                </div>
            </div>

            <!-- Product Line -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Product Line</label>
                <select class="form-control" id="view_product_line" name="ViewselProductLine" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="Card Connector">Card Connector</option>
                  <option value="TC/DC Connector">TC/DC Connector</option>
                  <option value="Flexicon and Connectors">Flexicon and Connectors</option>
                  <option value="Burn-in Sockets">Burn-in Sockets</option>
                  <option value="Test Sockets">Test Sockets(incl. Probe)</option>
                  <option value="PPS Eng">PPS Eng'g</option>
                  <option value="YFLEX">YFLEX</option>
                  <option value="FUS/FRS/FMS Connector">FUS/FRS/FMS Connector</option>    
                  <option value="Flexicon and Connectors Eng">Flexicon and Connectors Eng'g</option>     
                  <option value="Facility">Facility</option>     
                  <option value="YFLEX Supplies">YFLEX Supplies</option>
                  <option value="Burn-in Sockets Eng">Burn-in Sockets Eng'g</option>   
                  <option value="TC/DC Connector Eng">TC/DC Connector Eng'g</option>                                                                   
                </select>
              </div>
            </div>

            <!-- Division -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Division</label>
                <select class="form-control" id="view_division" name="ViewselDivision" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="CN">CN</option>
                  <option value="TS">TS</option>
                  <option value="PP">PP</option>
                  <option value="YF">YF</option>
                  <option value="Admin">Admin</option>                                                              
                </select>
              </div>
            </div>

            <!-- Expense Item -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Expense Item</label>
                <select class="form-control" id="view_expense_item" name="ViewselExpenseItem" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="Freight-in">Freight-in</option>
                  <option value="Equipment">Equipment</option>
                  <option value="R0014 Machineries">R0014 Machineries</option>
                  <option value="Material Handling">Material Handling</option>                                                           
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total FRT.</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="view_total_frt_php" id="txtViewTotalFRTPHP" placeholder="Total FRT." min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total FRT.</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">$</span>               
                      <input type="number" class="form-control" name="view_total_frt_usd" id="txtViewTotalFRTUSD" placeholder="Total FRT." min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Broker Total Local Handling</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="view_broker_total_local_handling" id="txtViewBrokerTotalLocalHandling" placeholder="Broker Total Local Handling" min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total Duties and Taxes</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱</span>               
                      <input type="number" class="form-control" name="view_total_duties_and_taxes" id="txtViewTotalDutiesAndTaxes" placeholder="Total Duties and Taxes" min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

            <!-- Remarks -->
            <div class="form-group">
              <div class="col-sm-12">
                <label>Remarks</label>
                <select class="form-control" id="view_remarks" name="ViewselRemarks" style="pointer-events: none;" readonly>
                  <option selected disabled>-- Select One --</option>
                  <option value="Complete Documents">Complete Documents</option>
                  <option value="Incomplete Documents">Incomplete Documents</option>
                  <option value="Others">Others</option>                                                          
                </select>
                <div class="input-group-prepend">
                  <button type="button" class="btn btn-primary" id="btnViewRemarksBack"><i class="fas fa-arrow-left"></i></button>                
                    <input type="hidden" class="form-control" name="other_remarks" id="txtViewOtherRemarks" placeholder="Others" value="" maxlength="50" readonly>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <label class="col-sm-10 control-label">Additional Item</label>
              <div class="row">
                <table class="table table-bordered" id="view_dynamic_field">
                  <tr> 
                    <td width="100px" style="border-style:hidden;">
                        <button type="button" class="btn btn-success" name="add" id="add"><i class="fa fa-plus"></i></button>
                    </td>
                    <td style="border-style:hidden;">
                        <input type="text" class="form-control" name="view_additional_item[]" id="txtViewAdditionalItem" placeholder="" value="" maxlength="50" readonly>
                    </td>
                  </tr>               
                </table>              
              </div>              
            </div>

            <div class="form-group">
              <label class="col-sm-10 control-label">Total Amount</label>
                <div class="col-sm-12">
                  <div class="input-group-prepend">
                    <span class="input-group-text">₱ / $</span>               
                      <input type="number" class="form-control" name="view_total_amount" id="txtViewTotalAmount" placeholder="Total Amount" min="0" value="0" step="0.01" maxlength="50" readonly>
                  </div>   
                </div>
            </div>

          </div>          
        </div>
      </div> 

      <div class="modal-footer">
      </div>
     
      </form>
    </div>
  </div>
</div>


<!--Approve Form (Section Head)-->
<div class="modal fade" id="modalCheckIncShippingDetails" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-check-circle"></i> Approve Checksheet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="formCheckIncShippingDetails">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <input type="hidden" class="form-control" name="sect_head_approve_incshippingform_id" id="txtCheckIncShippingDetailsId" readonly>
              <input type="hidden" class="form-control" name="sect_head_approve_incshippingform_status" id="txtCheckIncShippingDetailsStatus" readonly>
              <center>
                <label>Are you sure you want to approve this record?</label>  
              </center>            
            </div>
          </div>      
   
          <div class="row">        
          </div> 

          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default mr-auto" data-dismiss="modal" id="btnCloseCheckIncShippingDetails"> Close</button>

            <button type="button" class="btn btn-sm btn-success" approval_s='1' id="btnCheckIncShippingDetails"><i id="iBtnCheckIncShippingDetails" class="fa fa-check-circle"></i> Approve</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<!--Approve Form (General Manager)-->
<div class="modal fade" id="modalCheckIncShippingDetailsGenManager" data-backdrop="static">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-check-circle"></i> Approve Checksheet</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="formCheckIncShippingDetailsGenManager">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <input type="hidden" class="form-control" name="gen_manager_approve_incshippingform_id" id="txtGenManagerCheckIncShippingDetailsId" readonly>
              <input type="hidden" class="form-control" name="gen_manager_approve_incshippingform_status" id="txtGenManagerCheckIncShippingDetailsStatus" readonly>
              <center>
                <label>Are you sure you want to approve this record?</label>  
              </center>            
            </div>
          </div>      
   
          <div class="row">        
          </div> 

          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default mr-auto" data-dismiss="modal" id="btnCloseCheckIncShippingDetailsGenManager"> Close</button>

            <button type="button" class="btn btn-sm btn-success" approval_s='2' id="btnCheckIncShippingDetailsGenManager"><i id="iBtnCheckIncShippingDetailsGenManager" class="fa fa-check-circle"></i> Approve</button>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@section('js_content')
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // Datatable of Shipment Details
  dt_shipment_details = $('#tbl_shipment_details').DataTable({

    "processing" : true,
    "serverSide" : true,
    "ajax" : {
      url: "view_incoming_shipment_details_table",
      data: function (param){

      }
    },
    
    "columns":[

      { "data" : "status" },
      { "data" : "particulars" },
      { "data" : "shipment_date" },
      { "data" : "product_description" },
      { "data" : "qty_per_pcs" },
      { "data" : "origin" },
      { "data" : "invoice_no" },
      { "data" : "action", orderable:false, searchable:false },
      
    ],
  });

  // Get Incoming Shipment Details by ID
  $(document).on('click', '.btn-view-incshipmentform', function(){
    let incshipmentdetailsId = $(this).attr('incshipmentform-id');
    $("#txtViewIncomingShipmentDetailsId").val(incshipmentdetailsId);
    GetIncomingShipmentDetailsById(incshipmentdetailsId);
  });

  // Get Checksheet details by ID to Approve (Supervisor)
  $(document).on('click', '.btn-approve-incshipmentform-sectionhead', function(){
    let incshipmentdetailsId = $(this).attr('incshipmentform-id');
    $("#txtCheckIncShippingDetailsId").val(incshipmentdetailsId);
    GetIncomingShipmentDetailsById(incshipmentdetailsId);
  });

  // Get Checksheet details by ID to Approve (General Manager)
  $(document).on('click', '.btn-approve-incshipmentform-genmanager', function(){
    let incshipmentdetailsId = $(this).attr('incshipmentform-id');
    $("#txtGenManagerCheckIncShippingDetailsId").val(incshipmentdetailsId);
    GetIncomingShipmentDetailsById(incshipmentdetailsId);
  });

    $("#btnRemarksBack").prop('hidden', true);

    $('#remarks').change(function() {      
        if ( $(this).val() == "Others"){       
            $('#txtOtherRemarks').attr('type', 'text');
            $("#btnRemarksBack").prop('hidden', false);
            $('#remarks').attr("hidden",true);
        }else {       
            $('#txtOtherRemarks').attr('type', 'hidden');
            $("#btnRemarksBack").prop('hidden', true);
            $('#remarks').attr("hidden",false);
        }
    });

    $('#btnRemarksBack').click(function() { 
        $('#txtOtherRemarks').attr('type', 'hidden');
        $("#btnRemarksBack").prop('hidden', true);
        $('#remarks').attr("hidden",false);
    });

    //Add Incoming Shipment Details
    $("#formAddNewIncShippingDetails").submit(function(event){
      event.preventDefault();
      AddIncShippingDetails();
    });    

    var i=1; 
    $('#add').click(function(){  
        i++;  
        $('#dynamic_field').append('<tr id="row'+i+'"><td style="border-style:hidden;"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" ><i class="fa fa-times"></i></button></td><td style="border-style:hidden;"><input type="text" class="form-control" name="add_additional_item[]" id="txtAdditionalItem" placeholder="" value="" maxlength="50" required=""></td><td style="border-style:hidden;"></td></tr>');  
    });  
    $(document).on('click', '.btn_remove', function(){  
        var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();   
    });  

    $('#btnCheckIncShippingDetails').click(function(){
      let approval_s = $(this).attr('approval_s');
      $('#txtCheckIncShippingDetailsStatus').val(approval_s);
      $('#formCheckIncShippingDetails').submit();    
    });

    $("#formCheckIncShippingDetails").submit(function(event){
      event.preventDefault();
      SectionHeadApproveIncShippingForm();
    });      

    $('#btnCheckIncShippingDetailsGenManager').click(function(){
      let approval_s = $(this).attr('approval_s');
      $('#txtGenManagerCheckIncShippingDetailsStatus').val(approval_s);
      $('#formCheckIncShippingDetailsGenManager').submit();    
    });

    $("#formCheckIncShippingDetailsGenManager").submit(function(event){
      event.preventDefault();
      GenManagerApproveIncShippingForm();
    });      

});
</script>
@endsection