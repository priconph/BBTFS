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
				<th height="40" style="text-align: left; vertical-align: center; font-family:'Arial'; font-size: 20pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold;"> INCOMING SHIPMENT FOR THE MONTH OF {{ $data[1]['start'] }} to {{ $data[2]['end'] }} </th>	
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
			@foreach($data[0]['export_product_line_FFFC'] as $row)	
			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->arrival_date_pricon != null)
						{{ $row->shipment_details->arrival_date_pricon }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->gross_weight != null)
						{{ $row->shipment_details->gross_weight }}
					@else
						-
					@endif								
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->charge_weight != null)
						{{ $row->shipment_details->charge_weight }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->flt != null)
						{{ $row->shipment_details->flt }}
					@else
						-
					@endif								
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->product_description != null)
						{{ $row->shipment_details->product_description }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->qty_per_pcs != null)
						{{ $row->shipment_details->qty_per_pcs }}
					@else
						-
					@endif								
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->shipper != null)
						{{ $row->shipment_details->shipper }}
					@else
						-
					@endif								
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->origin != null)
						{{ $row->shipment_details->origin }}
					@else
						-
					@endif								
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->hawb_no_or_bl_no != null)
						{{ $row->shipment_details->hawb_no_or_bl_no }}
					@else
						-
					@endif								
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->shipment_details->import_permit_no != null)
						{{ $row->shipment_details->import_permit_no }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->invoice_no != null)
						{{ $row->invoice_no }}
					@else
						-
					@endif									
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->suppliers_invoice_value_usd != null)
						{{ $row->suppliers_invoice_value_usd }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->term_of_payment != null)
						{{ $row->term_of_payment }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->forwarder_or_broker != null)
						{{ $row->forwarder_or_broker }}
					@else
						-
					@endif									
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->forwarder_broker_billing_invoiceno != null)
						{{ $row->forwarder_broker_billing_invoiceno }}
					@else
						-
					@endif									
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->product_line != null)
						{{ $row->product_line }}
					@else
						-
					@endif									
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->expense_item != null)
						{{ $row->expense_item }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->total_frt_php != null)
						{{ $row->total_frt_php }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->total_frt_usd != null)
						{{ $row->total_frt_usd }}
					@else
						-
					@endif									
				</td>			
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->broker_total_local_handling != null)
						{{ $row->broker_total_local_handling }}
					@else
						-
					@endif									
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
					@if ( $row->total_duties_and_taxes != null)
						{{ $row->total_duties_and_taxes }}
					@else
						-
					@endif									
				</td>			
			</tr>

			@endforeach

		</tbody>
	</table>
</body>
</html>