<html>
<head>
<style>



th,td {
  padding: 10px;
}

td {
	padding: 5px;
}

</style>

</head>
<body>
	<table>

		<thead>

			<!-- Excel Headers -->

			<tr>		
			</tr>

			<tr>
				<th style="text-align: left; font-family:'Arial'; font-size: 20pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold;"> INCOMING SHIPMENT FOR THE MONTH OF {{ $start }} to {{ $end }} </th>	
			</tr>

			<!-- Table Headers -->	

			<tr>
				<th width="20" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Date Received </th>
				<th width="10" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Gross Weight </th>
				<th width="10" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Charge Weight </th>
				<th width="12" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> FLT </th>
				<th width="12" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Product Description </th>
				<th width="12" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> QTy. / Pcs. </th>
				<th width="12" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Shipper </th>
				<th width="14" height="60" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Origin </th>
				<th width="20" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> HAWB No. / BL No. </th>		
				<th width="16" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Import Permit No. </th>	
				<th width="30" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Invoice No. </th>	
				<th width="14" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Suppliers Invoice Value (US$) </th>	
				<th width="12" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Term of Payment </th>	
				<th width="38" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Forward / Broker </th>	
				<th width="30" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Forwarders / Broker Billing Invoice No. </th>
				<th width="24" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Product Line </th>		
				<th width="22" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Expense Item </th>	
				<th width="12" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Total FRT. (PHP) </th>	
				<th width="12" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Total FRT. (USD) </th>	
				<th width="12" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Total Local Handling (PHP) </th>	
				<th width="12" height="60"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> Total Duties and Taxes (PHP) </th>	
			</tr>
		</thead>

		<tbody>

			<!-- Table Data -->

			@for($i = 0; $i < count($export_data_other_month_billings); $i++)

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->arrival_date_pricon != null)
						{{ $export_data_other_month_billings[$i]->arrival_date_pricon }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->gross_weight != null)
						{{ $export_data_other_month_billings[$i]->gross_weight }}
					@else
						-
					@endif								
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->charge_weight != null)
						{{ $export_data_other_month_billings[$i]->charge_weight }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->flt != null)
						{{ $export_data_other_month_billings[$i]->flt }}
					@else
						-
					@endif								
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->product_description != null)
						{{ $export_data_other_month_billings[$i]->product_description }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->qty_per_pcs != null)
						{{ $export_data_other_month_billings[$i]->qty_per_pcs }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->shipper != null)
						{{ $export_data_other_month_billings[$i]->shipper }}
					@else
						-
					@endif								
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->origin != null)
						{{ $export_data_other_month_billings[$i]->origin }}
					@else
						-
					@endif								
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->hawb_no_or_bl_no != null)
						{{ $export_data_other_month_billings[$i]->hawb_no_or_bl_no }}
					@else
						-
					@endif								
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->import_permit_no != null)
						{{ $export_data_other_month_billings[$i]->import_permit_no }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->invoice_no != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->invoice_no }}
					@else
						-
					@endif									
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->suppliers_invoice_value_usd != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->suppliers_invoice_value_usd }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->term_of_payment != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->term_of_payment }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->forwarder_or_broker != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->forwarder_or_broker }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->forwarder_broker_billing_invoiceno != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->forwarder_broker_billing_invoiceno }}
					@else
						-
					@endif									
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->product_line != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->product_line }}
					@else
						-
					@endif									
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->expense_item != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->expense_item }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->total_frt_php != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->total_frt_php }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->total_frt_usd != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->total_frt_usd }}
					@else
						-
					@endif									
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->broker_total_local_handling != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->broker_total_local_handling }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $export_data_other_month_billings[$i]->invoice_details->total_duties_and_taxes != null)
						{{ $export_data_other_month_billings[$i]->invoice_details->total_duties_and_taxes }}
					@else
						-
					@endif									
				</td>			
			</tr>

			@endfor

		</tbody>
	</table>
</body>
</html>