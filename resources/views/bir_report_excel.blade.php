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
				<th style="text-align: left; font-family:'Arial'; font-size: 10pt; padding: 10px 10px; margin: 10px 10px "> Pricon Microelectronics Inc. </th>		
			</tr>

			<tr>				
			</tr>

			<tr>
				<th style="text-align: left; font-family:'Arial'; font-size: 10pt; padding: 10px 10px; margin: 10px 10px "> Summary of Importation for the Quarter Ending </th>						
			</tr>

			<tr>	
				<th style="text-align: left; font-family:'Arial'; font-size: 10pt; padding: 10px 10px; margin: 10px 10px "> Attached to BIR Form 2550 Q </th>							
			</tr>

			<tr>				
			</tr>

			<!-- Table Headers -->	

			<tr>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Month Year </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> IED No. </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Assessment / Release Date </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Importation Date </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Seller's Name </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Country of Origin </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Dutiable Value </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Handling Cost </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Landed Cost </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> HAWB No. </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; border: 1px solid black; word-wrap: break-word; color:#0000ff;"> Forwarder </th>			
			</tr>
		</thead>

		<tbody>

			<!-- Table Data -->

			@for($i = 0; $i < count($export_data_bir_report); $i++)

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">		
					@if ( $export_data_bir_report[$i]->shipment_date != null)
						{{ $export_data_bir_report[$i]->shipment_date }}
					@else
						-
					@endif							
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->import_permit_no != null)
						{{ $export_data_bir_report[$i]->import_permit_no }}
					@else
						-
					@endif		
				</td>		
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->shipment_date != null)
						{{ $export_data_bir_report[$i]->shipment_date }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->shipment_date != null)
						{{ $export_data_bir_report[$i]->shipment_date }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->shipper != null)
						{{ $export_data_bir_report[$i]->shipper }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->origin != null)
						{{ $export_data_bir_report[$i]->origin }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->invoice_details->total_duties_and_taxes != null)
						 ₱ {{ $export_data_bir_report[$i]->invoice_details->total_duties_and_taxes }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->invoice_details->broker_total_local_handling != null)
						{{ $export_data_bir_report[$i]->invoice_details->broker_total_local_handling }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->invoice_details->total_amount != null)
						 ₱ {{ $export_data_bir_report[$i]->invoice_details->total_amount }}
					@else
						-
					@endif
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->hawb_no_or_bl_no != null)
						{{ $export_data_bir_report[$i]->hawb_no_or_bl_no }}
					@else
						-
					@endif
				</td>	
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
					@if ( $export_data_bir_report[$i]->invoice_details->forwarder_or_broker != null)
						{{ $export_data_bir_report[$i]->invoice_details->forwarder_or_broker }}
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