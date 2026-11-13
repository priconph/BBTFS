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
			<!-- Table Headers -->
			<tr>				
			</tr>

			<tr>	
				<th colspan="8" width="20" style="text-align: center; font-family:'Arial'; font-size: 20pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold ">
					@if($start == $end)
						IMPORTATION DATA {{ $start }} 
					@else
						IMPORTATION DATA {{ $start }} to {{ $end }}
					@endif
				</th>						
			</tr>

			<tr>				
			</tr>
									
			<tr>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> CAPITAL GOODS MACHINERY / EQUIPMENT TOOLS / SPARE PARTS </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> IMPORT PERMIT NO. </th>
				<th width="24" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> DATE RECEIVED </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> HAWB NO. / BL NO. </th>
				<th width="20" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> QTY. </th>
				<th width="12" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> U/M </th>
				<th width="38" height="65" style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> INVOICE VALUE (US$) </th>
				<th width="20" height="65"style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black"> TERM OF PAYMENT </th>
			</tr>
		</thead>

		<tbody>

			<!-- Table Data -->

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> EQUIPMENTS / SPARE PARTS / TOOLS</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
			</tr>

			@for($i = 0; $i < count($export_data_acc_peza_lisp_espt); $i++)

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">				
						{{ $export_data_acc_peza_lisp_espt[$i]->product_description }}					
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">	
						{{ $export_data_acc_peza_lisp_espt[$i]->import_permit_no }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_espt[$i]->arrival_date_pricon }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_espt[$i]->hawb_no_or_bl_no }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_espt[$i]->qty_per_pcs }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						PCS.	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_espt[$i]->invoice_details->suppliers_invoice_value_usd }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_espt[$i]->invoice_details->term_of_payment }}	
				</td>				
			</tr>

			@endfor
			
			<!-- Table Footer-->

			<tr>				
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
			</tr>

			<!-- Second Table Data -->

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"> RAW MATERIALS AND SUPPLIES</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #bfbfbf; border: 1px solid black; word-wrap: break-word"></td>
			</tr>


			@for($i = 0; $i < count($export_data_acc_peza_lisp_rms); $i++)

			<tr>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->product_description }}					
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->import_permit_no }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->arrival_date_pricon }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->hawb_no_or_bl_no }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->qty_per_pcs }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						PCS.	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->invoice_details->suppliers_invoice_value_usd }}	
				</td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; border: 1px solid black; word-wrap: break-word">
						{{ $export_data_acc_peza_lisp_rms[$i]->invoice_details->term_of_payment }}	
				</td>				
			</tr>

			@endfor
			
			<!-- Table Footer-->

			<tr>				
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
				<td style="text-align: center; vertical-align: center; font-family:'Arial'; font-size: 8pt; padding: 10px 10px; margin: 10px 10px; font-weight: bold; background-color: #ffff00; border: 1px solid black; word-wrap: break-word"></td>
			</tr>

		</tbody>
	</table>
</body>
</html>