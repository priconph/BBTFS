<?php

namespace App\Exports\Sheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;


class ACCTNG implements FromView, WithEvents, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $data;

    function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {

        return view('po_and_ca_excel_acctng', [
            'data' => $this->data,
        ]);
    }    

    //for designs
    public function registerEvents(): array
    {
        $styleBorderThin = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000']
                ]
            ]
        ];

        $data = $this->data;

        return [
            AfterSheet::class => function(AfterSheet $event) use ($data,$styleBorderThin) {

            	// $data_pos = '';

            	// for ($i=0; $i < count($data[0]['export_data_po_and_ca']); $i++) { 
            	// 	$data_pos = $i + 14;
            	// 	$data_pos_footer = $i - 4;
            	// 	$data_pos_footer2 = $i - 5;
             //        $data_pos_footer3 = $i - 3;
             //        $data_pos_footer4 = $i - 2;
             //        $data_pos_footer5 = $i - 1;
             //        $data_pos_footer6 = $i + 1;
             //        $data_pos_footer7 = $i + 2;
             //        $data_pos_footer8 = $i + 3;
             //        $data_pos_footer9 = $i + 4;
             //        $data_pos_footer10 = $i + 5;
             //        $data_pos_footer11 = $i + 6;
             //        $data_pos_footer12 = $i + 7;
             //        $data_pos_footer13 = $i + 8;
             //        $data_pos_footer14 = $i + 9;

            	// 	$footer_pos = $data_pos_footer + count($data);
            	// 	$footer_pos2 = $data_pos_footer2 + count($data);
             //        $footer_pos3 = $data_pos_footer3 + count($data);
             //        $footer_pos4 = $data_pos_footer4 + count($data);
             //        $footer_pos5 = $data_pos_footer5 + count($data);
             //        $footer_pos6 = $data_pos_footer6 + count($data);
             //        $footer_pos7 = $data_pos_footer7 + count($data);
             //        $footer_pos8 = $data_pos_footer8 + count($data);
             //        $footer_pos9 = $data_pos_footer9 + count($data);
             //        $footer_pos10 = $data_pos_footer10 + count($data);
             //        $footer_pos11 = $data_pos_footer11 + count($data);
             //        $footer_pos12 = $data_pos_footer12 + count($data);
             //        $footer_pos13 = $data_pos_footer13 + count($data);
             //        $footer_pos14 = $data_pos_footer14 + count($data);

            	// 	$main_data_border_range_row = 'A'.$data_pos.':J'.$data_pos;	
            	// 	$main_data_border_range_col = 'G'.$data_pos;
            	// 	$main_data_border_range_col2 = 'H'.$data_pos;	
            	// 	$main_data_border_range_col3 = 'I'.$data_pos;	


            	// 	$event->sheet->getStyle($main_data_border_range_row)->applyFromArray($styleBorderThin);    
            	// 	$event->sheet->getStyle($main_data_border_range_col)->applyFromArray($styleBorderThin);  
            	// 	$event->sheet->getStyle($main_data_border_range_col2)->applyFromArray($styleBorderThin);  
            	// 	$event->sheet->getStyle($main_data_border_range_col3)->applyFromArray($styleBorderThin);  
            	// }

                // $sub_header_border_range_row = 'A13:J13';   
                // $main_data_border_range_col = 'G13';  
                // $main_data_border_range_col2 = 'H13';
                // $main_data_border_range_col3 = 'I13';
                // $main_data_border_range_col4 = 'J13';
                // $main_footer_border_range_row = 'A'.$footer_pos.':H'.$footer_pos;   
                // $main_footer_border_range_row2 = 'A'.$footer_pos2.':H'.$footer_pos2;   
                // $main_footer_border_range_row3 = 'A'.$footer_pos3.':H'.$footer_pos3;   
                // $main_footer_border_range_row4 = 'A'.$footer_pos4.':H'.$footer_pos4;   
                // $main_footer_border_range_row5 = 'A'.$footer_pos5.':H'.$footer_pos5;   
                // $main_footer_border_range_row6 = 'A'.$footer_pos6.':H'.$footer_pos6;   
                // $main_footer_border_range_row7 = 'A'.$footer_pos7.':H'.$footer_pos7;   
                // $main_footer_border_range_row8 = 'A'.$footer_pos8.':H'.$footer_pos8;   
                // $main_footer_border_range_row9 = 'A'.$footer_pos9.':H'.$footer_pos9;   
                // $main_footer_border_range_row10 = 'A'.$footer_pos10.':H'.$footer_pos10;   
                // $main_footer_border_range_row11 = 'A'.$footer_pos11.':H'.$footer_pos11;   
                // $main_footer_border_range_row12 = 'A'.$footer_pos12.':H'.$footer_pos12;
                // $main_footer_border_range_row13 = 'A'.$footer_pos13.':H'.$footer_pos13;   
                // $main_footer_border_range_row14 = 'A'.$footer_pos14.':H'.$footer_pos14;    

                // $event->sheet->getStyle($sub_header_border_range_row)->applyFromArray($styleBorderThin);               
                // $event->sheet->getStyle($main_data_border_range_col)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_data_border_range_col2)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_data_border_range_col3)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_data_border_range_col4)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row2)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row3)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row4)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row5)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row6)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row7)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row8)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row9)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row10)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row11)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row12)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row13)->applyFromArray($styleBorderThin);
                // $event->sheet->getStyle($main_footer_border_range_row14)->applyFromArray($styleBorderThin);
                    
            },
        ];
    }

    public function title(): string
    {
        return 'ACCTNG';
    }    
}
