function AddIncShippingDetails(){
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "3000",
      "timeOut": "3000",
      "extendedTimeOut": "3000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut",
    };

    let form_data = new FormData($('#formAddNewIncShippingDetails')[0]);

    $.ajax({
        url: "add_incoming_shipment_details",
        method: "POST",
        processData: false,
        contentType: false,
        data: form_data,
        dataType: "json",
        beforeSend: function(){
            $("#ibtnSubmitIncomingShipmentIcon").removeClass('fa fa-upload')
            $("#ibtnSubmitIncomingShipmentIcon").addClass('fa fa-spinner fa-pulse');
            $("#btnSubmitIncomingShipment").prop('disabled', 'disabled');
        },
        success: function(JsonObject){

            $("#ibtnSubmitIncomingShipmentIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnSubmitIncomingShipment").removeAttr('disabled');
            $("#ibtnSubmitIncomingShipmentIcon").addClass('fa fa-upload');

            if(JsonObject['result'] == 1){
              $("#modalNewIncShippingDetails").modal('hide');
              $("#formAddNewIncShippingDetails")[0].reset();

              $("#particulars").removeClass('is-invalid');
              $("#txtArrivalDatePricon").removeClass('is-invalid');
              $("#txtGrossWeight").removeClass('is-invalid');
              $("#txtChargeWeight").removeClass('is-invalid');
              $("#txtFLT").removeClass('is-invalid');
              $("#product_description").removeClass('is-invalid');
              $("#txtQtyPcs").removeClass('is-invalid');
              $("#shipper").removeClass('is-invalid');
              $("#origin").removeClass('is-invalid');
              $("#txtHAWBBLNo").removeClass('is-invalid');
              $("#txtImportPermitNo").removeClass('is-invalid');
              $("#txtInvoiceNo").removeClass('is-invalid');
              $("#txtSuppliersInvoiceValueUSD").removeClass('is-invalid');
              $("#term_of_payment").removeClass('is-invalid');
              $("#forwarder_or_broker").removeClass('is-invalid');
              $("#txtForwarderBrokerBillingInvoiceNo").removeClass('is-invalid');
              $("#product_line").removeClass('is-invalid');
              $("#division").removeClass('is-invalid');
              $("#expense_item").removeClass('is-invalid');
              $("#txtTotalFRTPHP").removeClass('is-invalid');
              $("#txtTotalFRTUSD").removeClass('is-invalid');
              $("#txtBrokerTotalLocalHandling").removeClass('is-invalid');
              $("#txtTotalDutiesAndTaxes").removeClass('is-invalid');
              $("#remarks").removeClass('is-invalid');
              $("#txtOtherRemarks").removeClass('is-invalid');
              $("#txtTotalAmount").removeClass('is-invalid');

              dt_shipment_details.draw();
              toastr.success('Data succesfully saved!');       
            }
            else{
                toastr.error(' Saving of Data Failed!');

                if(JsonObject['error']['selParticulars'] === undefined){
                    $("#particulars").removeClass('is-invalid');
                    $("#particulars").attr('title', '');
                }
                else{
                    $("#particulars").addClass('is-invalid');
                    $("#particulars").attr('title', JsonObject['error']['selParticulars']);
                } 

                if(JsonObject['error']['arrival_date_pricon'] === undefined){
                    $("#txtArrivalDatePricon").removeClass('is-invalid');
                    $("#txtArrivalDatePricon").attr('title', '');
                }
                else{
                    $("#txtArrivalDatePricon").addClass('is-invalid');
                    $("#txtArrivalDatePricon").attr('title', JsonObject['error']['arrival_date_pricon']);
                }   

                if(JsonObject['error']['gross_weight'] === undefined){
                    $("#txtGrossWeight").removeClass('is-invalid');
                    $("#txtGrossWeight").attr('title', '');
                }
                else{
                    $("#txtGrossWeight").addClass('is-invalid');
                    $("#txtGrossWeight").attr('title', JsonObject['error']['gross_weight']);
                }    

                if(JsonObject['error']['charge_weight'] === undefined){
                    $("#txtChargeWeight").removeClass('is-invalid');
                    $("#txtChargeWeight").attr('title', '');
                }
                else{
                    $("#txtChargeWeight").addClass('is-invalid');
                    $("#txtChargeWeight").attr('title', JsonObject['error']['charge_weight']);
                }          
                if(JsonObject['error']['flt'] === undefined){
                    $("#txtFLT").removeClass('is-invalid');
                    $("#txtFLT").attr('title', '');
                }
                else{
                    $("#txtFLT").addClass('is-invalid');
                    $("#txtFLT").attr('title', JsonObject['error']['flt']);
                }   
                if(JsonObject['error']['selProductDescription'] === undefined){
                    $("#product_description").removeClass('is-invalid');
                    $("#product_description").attr('title', '');
                }
                else{
                    $("#product_description").addClass('is-invalid');
                    $("#product_description").attr('title', JsonObject['error']['selProductDescription']);
                }   
                if(JsonObject['error']['qty_pcs'] === undefined){
                    $("#txtQtyPcs").removeClass('is-invalid');
                    $("#txtQtyPcs").attr('title', '');
                }
                else{
                    $("#txtQtyPcs").addClass('is-invalid');
                    $("#txtQtyPcs").attr('title', JsonObject['error']['qty_pcs']);
                }  
                if(JsonObject['error']['selShipper'] === undefined){
                    $("#shipper").removeClass('is-invalid');
                    $("#shipper").attr('title', '');
                }
                else{
                    $("#shipper").addClass('is-invalid');
                    $("#shipper").attr('title', JsonObject['error']['selShipper']);
                }      
                if(JsonObject['error']['selOrigin'] === undefined){
                    $("#origin").removeClass('is-invalid');
                    $("#origin").attr('title', '');
                }
                else{
                    $("#origin").addClass('is-invalid');
                    $("#origin").attr('title', JsonObject['error']['selOrigin']);
                }    
                if(JsonObject['error']['hawb_bl_no'] === undefined){
                    $("#txtHAWBBLNo").removeClass('is-invalid');
                    $("#txtHAWBBLNo").attr('title', '');
                }
                else{
                    $("#txtHAWBBLNo").addClass('is-invalid');
                    $("#txtHAWBBLNo").attr('title', JsonObject['error']['hawb_bl_no']);
                } 
                if(JsonObject['error']['import_permit_no'] === undefined){
                    $("#txtImportPermitNo").removeClass('is-invalid');
                    $("#txtImportPermitNo").attr('title', '');
                }
                else{
                    $("#txtImportPermitNo").addClass('is-invalid');
                    $("#txtImportPermitNo").attr('title', JsonObject['error']['import_permit_no']);
                }  
                if(JsonObject['error']['invoice_no'] === undefined){
                    $("#txtInvoiceNo").removeClass('is-invalid');
                    $("#txtInvoiceNo").attr('title', '');
                }
                else{
                    $("#txtInvoiceNo").addClass('is-invalid');
                    $("#txtInvoiceNo").attr('title', JsonObject['error']['invoice_no']);
                }   
                if(JsonObject['error']['suppliers_invoice_value_usd'] === undefined){
                    $("#txtSuppliersInvoiceValueUSD").removeClass('is-invalid');
                    $("#txtSuppliersInvoiceValueUSD").attr('title', '');
                }
                else{
                    $("#txtSuppliersInvoiceValueUSD").addClass('is-invalid');
                    $("#txtSuppliersInvoiceValueUSD").attr('title', JsonObject['error']['suppliers_invoice_value_usd']);
                }
                if(JsonObject['error']['selTermOfPayment'] === undefined){
                    $("#term_of_payment").removeClass('is-invalid');
                    $("#term_of_payment").attr('title', '');
                }
                else{
                    $("#term_of_payment").addClass('is-invalid');
                    $("#term_of_payment").attr('title', JsonObject['error']['selTermOfPayment']);
                }      
                if(JsonObject['error']['selForwarderOrBroker'] === undefined){
                    $("#forwarder_or_broker").removeClass('is-invalid');
                    $("#forwarder_or_broker").attr('title', '');
                }
                else{
                    $("#forwarder_or_broker").addClass('is-invalid');
                    $("#forwarder_or_broker").attr('title', JsonObject['error']['selForwarderOrBroker']);
                } 
                if(JsonObject['error']['forwarder_broker_billing_invoiceno'] === undefined){
                    $("#txtForwarderBrokerBillingInvoiceNo").removeClass('is-invalid');
                    $("#txtForwarderBrokerBillingInvoiceNo").attr('title', '');
                }
                else{
                    $("#txtForwarderBrokerBillingInvoiceNo").addClass('is-invalid');
                    $("#txtForwarderBrokerBillingInvoiceNo").attr('title', JsonObject['error']['forwarder_broker_billing_invoiceno']);
                }   
                if(JsonObject['error']['forwarder_broker_billing_invoiceno'] === undefined){
                    $("#txtForwarderBrokerBillingInvoiceNo").removeClass('is-invalid');
                    $("#txtForwarderBrokerBillingInvoiceNo").attr('title', '');
                }
                else{
                    $("#txtForwarderBrokerBillingInvoiceNo").addClass('is-invalid');
                    $("#txtForwarderBrokerBillingInvoiceNo").attr('title', JsonObject['error']['forwarder_broker_billing_invoiceno']);
                } 
                if(JsonObject['error']['selProductLine'] === undefined){
                    $("#product_line").removeClass('is-invalid');
                    $("#product_line").attr('title', '');
                }
                else{
                    $("#product_line").addClass('is-invalid');
                    $("#product_line").attr('title', JsonObject['error']['selProductLine']);
                }       
                if(JsonObject['error']['selDivision'] === undefined){
                    $("#division").removeClass('is-invalid');
                    $("#division").attr('title', '');
                }
                else{
                    $("#division").addClass('is-invalid');
                    $("#division").attr('title', JsonObject['error']['selDivision']);
                }  
                if(JsonObject['error']['selExpenseItem'] === undefined){
                    $("#expense_item").removeClass('is-invalid');
                    $("#expense_item").attr('title', '');
                }
                else{
                    $("#expense_item").addClass('is-invalid');
                    $("#expense_item").attr('title', JsonObject['error']['selExpenseItem']);
                }     
                if(JsonObject['error']['total_frt_php'] === undefined){
                    $("#txtTotalFRTPHP").removeClass('is-invalid');
                    $("#txtTotalFRTPHP").attr('title', '');
                }
                else{
                    $("#txtTotalFRTPHP").addClass('is-invalid');
                    $("#txtTotalFRTPHP").attr('title', JsonObject['error']['total_frt_php']);
                }              
                if(JsonObject['error']['total_frt_usd'] === undefined){
                    $("#txtTotalFRTUSD").removeClass('is-invalid');
                    $("#txtTotalFRTUSD").attr('title', '');
                }
                else{
                    $("#txtTotalFRTUSD").addClass('is-invalid');
                    $("#txtTotalFRTUSD").attr('title', JsonObject['error']['total_frt_usd']);
                }    
                if(JsonObject['error']['broker_total_local_handling'] === undefined){
                    $("#txtBrokerTotalLocalHandling").removeClass('is-invalid');
                    $("#txtBrokerTotalLocalHandling").attr('title', '');
                }
                else{
                    $("#txtBrokerTotalLocalHandling").addClass('is-invalid');
                    $("#txtBrokerTotalLocalHandling").attr('title', JsonObject['error']['broker_total_local_handling']);
                }            
                if(JsonObject['error']['selRemarks'] === undefined){
                    $("#remarks").removeClass('is-invalid');
                    $("#remarks").attr('title', '');
                }
                else{
                    $("#remarks").addClass('is-invalid');
                    $("#remarks").attr('title', JsonObject['error']['selRemarks']);
                }   
                if(JsonObject['error']['other_remarks'] === undefined){
                    $("#txtOtherRemarks").removeClass('is-invalid');
                    $("#txtOtherRemarks").attr('title', '');
                }
                else{
                    $("#txtOtherRemarks").addClass('is-invalid');
                    $("#txtOtherRemarks").attr('title', JsonObject['error']['other_remarks']);
                }                    
                if(JsonObject['error']['total_amount'] === undefined){
                    $("#txtTotalAmount").removeClass('is-invalid');
                    $("#txtTotalAmount").attr('title', '');
                }
                else{
                    $("#txtTotalAmount").addClass('is-invalid');
                    $("#txtTotalAmount").attr('title', JsonObject['error']['total_amount']);
                }                                                                                                                                                                                                                                                                                                                                                                                          
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);      
            $("#ibtnSubmitJORequestDefIcon").removeClass('fa fa-spinner fa-pulse');
            $("#btnSubmitJORequest").removeAttr('disabled');
            $("#ibtnSubmitJORequestDefIcon").addClass('fa fa-upload');
        }
    });
}

// View Incoming Shipment 
function GetIncomingShipmentDetailsById(incshipmentdetailsId){
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "3000",
      "timeOut": "3000",
      "extendedTimeOut": "3000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut",
    };

    $.ajax({
        url: "get_incshipmentdetails_by_id",
        method: "get",
        data: {
            shipment_details_id: incshipmentdetailsId
        },
        dataType: "json",
        beforeSend: function(){

            $("#txtViewIncomingShipmentDetailsId").val("");
            $("#view_particulars").val("");
            $("#txtViewArrivalDatePricon").val("");
            $("#txtViewShipmentDate").val("");
            $("#txtViewInvoiceDate").val("");
            $("#txtViewCutOffDate").val("");
            $("#txtViewDueDate").val("");
            $("#txtViewGrossWeight").val("");
            $("#txtViewChargeWeight").val("");
            $("#txtViewFLT").val("");
            $("#view_product_description").val("");
            $("#txtViewQtyPcs").val("");
            $("#view_shipper").val("");
            $("#view_origin").val("");
            $("#txtViewHAWBBLNo").val("");
            $("#txtViewImportPermitNo").val("");
            $("#txtViewInvoiceNo").val("");
            $("#txtViewSuppliersInvoiceValueUSD").val("");
            $("#view_term_of_payment").val("");
            $("#view_forwarder_or_broker").val("");
            $("#txtViewForwarderBrokerBillingInvoiceNo").val("");
            $("#view_product_line").val("");
            $("#view_division").val("");
            $("#view_expense_item").val("");
            $("#txtViewTotalFRTPHP").val("");
            $("#txtViewTotalFRTUSD").val("");
            $("#txtViewBrokerTotalLocalHandling").val("");
            $("#txtViewTotalDutiesAndTaxes").val("");
            $("#view_remarks").val("");
            $("#txtViewOtherRemarks").val("");
            $("#txtViewTotalAmount").val("");


            $("#txtViewIncomingShipmentDetailsId").removeClass('is-invalid');
            $("#view_particulars").removeClass('is-invalid');
            $("#txtViewArrivalDatePricon").removeClass('is-invalid');
            $("#txtViewShipmentDate").removeClass('is-invalid');
            $("#txtViewInvoiceDate").removeClass('is-invalid');
            $("#txtViewCutOffDate").removeClass('is-invalid');
            $("#txtViewDueDate").removeClass('is-invalid');
            $("#txtViewGrossWeight").removeClass('is-invalid');
            $("#txtViewChargeWeight").removeClass('is-invalid');
            $("#txtViewFLT").removeClass('is-invalid');
            $("#view_product_description").removeClass('is-invalid');
            $("#txtViewQtyPcs").removeClass('is-invalid');
            $("#view_shipper").removeClass('is-invalid');
            $("#view_origin").removeClass('is-invalid');
            $("#txtViewHAWBBLNo").removeClass('is-invalid');
            $("#txtViewImportPermitNo").removeClass('is-invalid');
            $("#txtViewInvoiceNo").removeClass('is-invalid');
            $("#txtViewSuppliersInvoiceValueUSD").removeClass('is-invalid');
            $("#view_term_of_payment").removeClass('is-invalid');
            $("#view_forwarder_or_broker").removeClass('is-invalid');
            $("#txtViewForwarderBrokerBillingInvoiceNo").removeClass('is-invalid');
            $("#view_product_line").removeClass('is-invalid');
            $("#view_division").removeClass('is-invalid');
            $("#view_expense_item").removeClass('is-invalid');
            $("#txtViewTotalFRTPHP").removeClass('is-invalid');
            $("#txtViewTotalFRTUSD").removeClass('is-invalid');
            $("#txtViewBrokerTotalLocalHandling").removeClass('is-invalid');
            $("#txtViewTotalDutiesAndTaxes").removeClass('is-invalid');
            $("#view_remarks").removeClass('is-invalid');
            $("#txtViewOtherRemarks").removeClass('is-invalid');
            $("#txtViewTotalAmount").removeClass('is-invalid');


        },
        success: function(JsonObject){

            let result = JsonObject['incshipdetes'];

            let addtnl_items_arr = result[0].invoice_details.additional_item.split(',');

            console.log (addtnl_items_arr.length);
            

            if(JsonObject['result'] == 1)
            {                
                $("#txtViewIncomingShipmentDetailsId").val(result[0].shipment_details_id);
                $("#view_particulars").val(result[0].particulars);
                $("#txtViewArrivalDatePricon").val(result[0].arrival_date_pricon);
                $("#txtViewShipmentDate").val(result[0].shipment_date);
                $("#txtViewInvoiceDate").val(result[0].invoice_date);
                $("#txtViewCutOffDate").val(result[0].cut_off_date);
                $("#txtViewDueDate").val(result[0].due_date);                
                $("#txtViewGrossWeight").val(result[0].gross_weight);
                $("#txtViewChargeWeight").val(result[0].charge_weight);
                $("#txtViewFLT").val(result[0].flt);
                $("#view_product_description").val(result[0].product_description);
                $("#txtViewQtyPcs").val(result[0].qty_per_pcs);
                $("#view_shipper").val(result[0].shipper);
                $("#view_origin").val(result[0].origin);
                $("#txtViewHAWBBLNo").val(result[0].hawb_no_or_bl_no);
                $("#txtViewImportPermitNo").val(result[0].import_permit_no);
                $("#txtViewInvoiceNo").val(result[0].invoice_details.invoice_no);
                $("#txtViewSuppliersInvoiceValueUSD").val(result[0].invoice_details.suppliers_invoice_value_usd);
                $("#view_term_of_payment").val(result[0].invoice_details.term_of_payment);
                $("#view_forwarder_or_broker").val(result[0].invoice_details.forwarder_or_broker);
                $("#txtViewForwarderBrokerBillingInvoiceNo").val(result[0].invoice_details.forwarder_broker_billing_invoiceno);
                $("#view_product_line").val(result[0].invoice_details.product_line);
                $("#view_division").val(result[0].invoice_details.division);
                $("#view_expense_item").val(result[0].invoice_details.expense_item);
                $("#txtViewTotalFRTPHP").val(result[0].invoice_details.total_frt_php);
                $("#txtViewTotalFRTUSD").val(result[0].invoice_details.total_frt_usd);
                $("#txtViewBrokerTotalLocalHandling").val(result[0].invoice_details.broker_total_local_handling);
                $("#txtViewTotalDutiesAndTaxes").val(result[0].invoice_details.total_duties_and_taxes);
                if (result[0].invoice_details.other_remarks_details == null) {
                    $("#view_remarks").val(result[0].invoice_details.remarks);  
                    $("#btnViewRemarksBack").prop('hidden', true);                
                }else{
                    $('#txtOtherRemarks').attr('type', 'text');
                    $("#btnViewRemarksBack").prop('hidden', false);
                    $('#remarks').attr("hidden",true);                    
                    $("#txtViewOtherRemarks").val(result[0].invoice_details.other_remarks_details);  
                }
                if(addtnl_items_arr.length > 0){
                $("#view_dynamic_field > tbody").html('');
                    for(let index = 0; index < addtnl_items_arr.length; index++){
                        let htmlRowAttachments = "";
                        htmlRowAttachments += '<tr>';
                        htmlRowAttachments += '<td style="border-style:hidden;"><input type="text" class="form-control" name="view_additional_item[]" id="txtViewAdditionalItem" placeholder="" value="' + addtnl_items_arr[index] + '" maxlength="50" readonly></td>';
                        htmlRowAttachments += '</tr>';

                        $("#view_dynamic_field > tbody").append(htmlRowAttachments);
                        $("#view_dynamic_field > tbody").find('tr:last').find('td .txtViewAdditionalItem').focus();
                    }
                }else{
                        let htmlRowAttachments = '<tr>';

                        htmlRowAttachments += '<td colspan="">No Data</td>';

                        htmlRowAttachments += '</tr>';

                        $("#view_dynamic_field > tbody").html(htmlRowAttachments);
                    }   
                $("#txtViewTotalAmount").val(result[0].invoice_details.total_amount);
            }
            else
            {
              toastr.error('Error Loading Data!');
            }         
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
    });
}

function SectionHeadApproveIncShippingForm(){
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "3000",
      "timeOut": "3000",
      "extendedTimeOut": "3000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut",
    };

    let form_data = new FormData($('#formCheckIncShippingDetails')[0]);

    $.ajax({
        url: "sect_head_approve_incshipmentdetails",
        method: "post",
        processData: false,
        contentType: false,
        data: form_data,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnCheckIncShippingDetails").addClass('fa fa-spinner fa-pulse');            
            $("#btnCheckIncShippingDetails").prop('disabled', 'disabled');
            $("#btnCloseCheckIncShippingDetails").prop('disabled', 'disabled');
        },        
        success: function(JsonObject){
            if(JsonObject['result'] == 1){

              $("#modalCheckIncShippingDetails").modal('hide');
              $("#formCheckIncShippingDetails")[0].reset();

              $("#iBtnCheckIncShippingDetails").removeClass('fa fa-spinner fa-pulse');
              $("#iBtnCheckIncShippingDetails").addClass('fa fa-check-circle');                
              $("#btnCheckIncShippingDetails").prop('disabled', false);
              $("#btnCloseCheckIncShippingDetails").prop('disabled', false);

              dt_shipment_details.draw();  
              toastr.success('Record Successfully Approved!');                
            }
            else{

              $("#iBtnCheckIncShippingDetails").removeClass('fa fa-spinner fa-pulse');
              $("#iBtnCheckIncShippingDetails").addClass('fa fa-check-circle');                
              $("#btnCheckIncShippingDetails").prop('disabled', false);
              $("#btnCloseCheckIncShippingDetails").prop('disabled', false);

              toastr.error('Approval of Record Failed!');                                              
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);      
        }
    });
}

function GenManagerApproveIncShippingForm(){
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "3000",
      "timeOut": "3000",
      "extendedTimeOut": "3000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut",
    };

    let form_data = new FormData($('#formCheckIncShippingDetailsGenManager')[0]);

    $.ajax({
        url: "gen_manager_approve_incshipmentdetails",
        method: "post",
        processData: false,
        contentType: false,
        data: form_data,
        dataType: "json",
        beforeSend: function(){
            $("#iBtnCheckIncShippingDetailsGenManager").addClass('fa fa-spinner fa-pulse');            
            $("#btnCheckIncShippingDetailsGenManager").prop('disabled', 'disabled');
            $("#btnCloseCheckIncShippingDetailsGenManager").prop('disabled', 'disabled');
        },        
        success: function(JsonObject){
            if(JsonObject['result'] == 1){

              $("#modalCheckIncShippingDetails").modal('hide');
              $("#formCheckIncShippingDetailsGenManager")[0].reset();

              $("#iBtnCheckIncShippingDetailsGenManager").removeClass('fa fa-spinner fa-pulse');
              $("#iBtnCheckIncShippingDetailsGenManager").addClass('fa fa-check-circle');                
              $("#btnCheckIncShippingDetailsGenManager").prop('disabled', false);
              $("#btnCloseCheckIncShippingDetailsGenManager").prop('disabled', false);

              dt_shipment_details.draw();  
              toastr.success('Record Successfully Approved!');                
            }
            else{

              $("#iBtnCheckIncShippingDetailsGenManager").removeClass('fa fa-spinner fa-pulse');
              $("#iBtnCheckIncShippingDetailsGenManager").addClass('fa fa-check-circle');                
              $("#btnCheckIncShippingDetailsGenManager").prop('disabled', false);
              $("#btnCloseCheckIncShippingDetailsGenManager").prop('disabled', false);

              toastr.error('Approval of Record Failed!');                                              
            }
        },
        error: function(data, xhr, status){
            toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);      
        }
    });
}