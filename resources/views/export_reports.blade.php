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
          <h1>Export Reports</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Export Reports</li>
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
              <h3 class="card-title">Export Reports</h3>
            </div>

            <!-- Start Page Content -->
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Incoming Shipment</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>Accounting PEZA LISP</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_acc_peza_lisp"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div>  
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Incoming Shipment</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>BIR Report</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_birreport"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div>      
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Incoming Shipment</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>Other Month Billings</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_other_month_billing"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div> 
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Incoming Shipment</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>PEZA Report</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_peza_report"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div>             
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Incoming Shipment</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>Product Line</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_product_line"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div>  
                <div class="col-sm-3">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><center><b>Billing</b></center></div>
                    <div class="card-body">
                      <p class="card-title"><center>Payment Order & Charging Accounts</center></p>
                      <p class="card-text"></p>
                    </div>
                    <div class="card-footer bg-transparent"><center><a class="btn btn-block btn-primary btn-sm" href="javascript:void(0)" id="export_paymentorder_chargingaccount"><i class="fa fa-file-excel"></i> Export</a></center></div>
                  </div>                
                </div>                                                                                
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

<!-- Export Accounting PEZA LISP -->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_acc_peza_lisp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export Accounting PEZA LISP</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_acc_peza_lisp" name="daterange_acc_peza_lisp" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
      <h4>Enter a date range </h4>
      <label>Start Date:</label>
      <input class="form-control" type="date" id="txt_date_start" name="txt_date_start" required>
      <label>End Date:</label>
      <input class="form-control" type="date" id="txt_date_end" name="txt_date_end" required>
     </form>   
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_acc_peza_lisp">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Export BIR Report-->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_bir_report">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export BIR Report</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_bir_report" name="daterange_bir_report" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
      <h4>Enter a date range </h4>
      <label>Start Date:</label>
      <input class="form-control" type="date" id="txt_date_start_bir_report" name="txt_date_start_bir_report" required>
      <label>End Date:</label>
      <input class="form-control" type="date" id="txt_date_end_bir_report" name="txt_date_end_bir_report" required>
     </form>   
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_bir_report">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Export Other Month Billings-->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_other_month_billings">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export Other Month Billings</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_other_month_billings" name="daterange_other_month_billings" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
      <h4>Enter a date range </h4>
      <label>Start Date:</label>
      <input class="form-control" type="date" id="txt_date_start_other_month_billings" name="txt_date_start_other_month_billings" required>
      <label>End Date:</label>
      <input class="form-control" type="date" id="txt_date_end_other_month_billings" name="txt_date_end_other_month_billings" required>
     </form>   
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_other_month_billings">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Export PEZA Report-->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_peza_report">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export PEZA Report</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_peza_report" name="daterange_peza_report" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
            <h4>Enter a date range </h4>
            <label>Start Date:</label>
            <input class="form-control" type="date" id="txt_date_start_peza_report" name="txt_date_start_peza_report" required>
            <label>End Date:</label>
            <input class="form-control" type="date" id="txt_date_end_peza_report" name="txt_date_end_peza_report" required>
        </form>   
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_peza_report">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Export PEZA Report-->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_product_line">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export Product Line</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_product_line" name="daterange_product_line" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
            <h4>Enter a date range </h4>
            <label>Start Date:</label>
            <input class="form-control" type="date" id="txt_date_start_product_line" name="txt_date_start_product_line" required>
            <label>End Date:</label>
            <input class="form-control" type="date" id="txt_date_end_product_line" name="txt_date_end_product_line" required>
        </form>   
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_product_line">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Export PEZA Report-->
<div class="modal fade" tabindex="-1" role="dialog" id="exportmodal_paymentorder_chargingaccounts">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">      
        <h4 class="modal-title"><i class="fa fa-file-excel"></i> Export Payment Order & Charging Accounts</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="daterange_paymentorder_chargingaccounts" name="daterange_paymentorder_chargingaccounts" method="post" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}"> 
      <h4>Enter a date range </h4>
      <label>Start Date:</label>
      <input class="form-control" type="date" id="txt_date_start_po_and_ca" name="txt_date_start_po_and_ca" required>
      <label>End Date:</label>
      <input class="form-control" type="date" id="txt_date_end_po_and_ca" name="txt_date_end_po_and_ca" required>
      <!-- Forwarder / Broker -->
      <label>Forwarder / Broker</label>
      <select class="form-control" id="forwarder_or_broker_po_and_ca" name="forwarder_or_broker_po_and_ca">
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
     </form>       
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-success" id="export_report_paymentorder_chargingaccounts">Export</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- /.content-wrapper -->
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


    $("#export_acc_peza_lisp").click(function(){
      $('#exportmodal_acc_peza_lisp').modal('show');
    });

    $("#export_report_acc_peza_lisp").click(function(){

      window.open("./export_accounting_peza_lisp?txt_date_start="+ $('#txt_date_start').val() +'&txt_date_end=' + $('#txt_date_end').val());

    });  

    $("#export_birreport").click(function(){
      $('#exportmodal_bir_report').modal('show');
    });

    $("#export_report_bir_report").click(function(){

      window.open("./export_bir_report?txt_date_start_bir_report="+ $('#txt_date_start_bir_report').val() +'&txt_date_end_bir_report=' + $('#txt_date_end_bir_report').val());

    });  

    $("#export_other_month_billing").click(function(){
      $('#exportmodal_other_month_billings').modal('show');
    });

    $("#export_report_other_month_billings").click(function(){

      window.open("./export_other_month_billings?txt_date_start_other_month_billings="+ $('#txt_date_start_other_month_billings').val() +'&txt_date_end_other_month_billings=' + $('#txt_date_end_other_month_billings').val());

    }); 

    $("#export_peza_report").click(function(){
      $('#exportmodal_peza_report').modal('show');
    });

    $("#export_report_peza_report").click(function(){

      window.open("./export_incshp_peza_report?txt_date_start_peza_report="+ $('#txt_date_start_peza_report').val() +'&txt_date_end_peza_report=' + $('#txt_date_end_peza_report').val());

    }); 

    $("#export_product_line").click(function(){
      $('#exportmodal_product_line').modal('show');
    });

    $("#export_report_product_line").click(function(){

      window.open("./export_product_line_report?txt_date_start_product_line="+ $('#txt_date_start_product_line').val() +'&txt_date_end_product_line=' + $('#txt_date_end_product_line').val());

    }); 

    $("#export_paymentorder_chargingaccount").click(function(){
      $('#exportmodal_paymentorder_chargingaccounts').modal('show');
    });

    $("#export_report_paymentorder_chargingaccounts").click(function(){

      window.open("./export_payment_order_and_charging_accounts_report?txt_date_start_po_and_ca="+ $('#txt_date_start_po_and_ca').val() +'&txt_date_end_po_and_ca=' + $('#txt_date_end_po_and_ca').val() +'&forwarder_or_broker_po_and_ca=' + $('#forwarder_or_broker_po_and_ca').val());

    }); 
    
  });
</script>
@endsection