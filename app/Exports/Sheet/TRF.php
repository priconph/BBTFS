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


class TRF implements FromView, WithEvents, WithTitle
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

        return view('po_and_ca_excel', [
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
        $styleBorderBottomThin = [
            'borders' => [
                'bottom' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000']
                ]
            ]
        ]; 
        $data = $this->data;

        return [
            AfterSheet::class => function(AfterSheet $event) use ($data,$styleBorderThin,$styleBorderBottomThin) {

            	$data_pos = '';

            	for ($i=0; $i < count($data[0]['export_data_po_and_ca']); $i++) { 
            		$data_pos = $i + 14;
            		$data_pos_footer = $i + 8;
            		$data_pos_footer2 = $i + 9;
                    $data_pos_footer3 = $i + 10;
                    $data_pos_footer4 = $i + 11;
                    $data_pos_footer5 = $i + 12;
                    $data_pos_footer6 = $i + 13;
                    $data_pos_footer7 = $i + 14;
                    $data_pos_footer8 = $i + 15;
                    $data_pos_footer9 = $i + 16;
                    $data_pos_footer10 = $i + 17;
                    $data_pos_footer11 = $i + 18;
                    $data_pos_footer12 = $i + 19;
                    $data_pos_footer13 = $i + 20;
                    $data_pos_footer14 = $i + 21;
                    $data_pos_footer15 = $i + 22;
                    $data_pos_footer16 = $i + 23;
                    $data_pos_footer17 = $i + 24;
                    $data_pos_footer18 = $i + 25;
                    $data_pos_footer19 = $i + 26;
                    $data_pos_footer20 = $i + 27;
                    $data_pos_footer21 = $i + 28;
                    $data_pos_footer22 = $i + 29;
                    $data_pos_footer23 = $i + 30;
                    $data_pos_footer24 = $i + 31;
                    $data_pos_footer25 = $i + 32;
                    $data_pos_footer26 = $i + 33;
                    $data_pos_footer27 = $i + 34;
                    $data_pos_footer28 = $i + 35;
                    $data_pos_footer29 = $i + 37;

            		$footer_pos = $data_pos_footer + count($data);
            		$footer_pos2 = $data_pos_footer2 + count($data);
                    $footer_pos3 = $data_pos_footer3 + count($data);
                    $footer_pos4 = $data_pos_footer4 + count($data);
                    $footer_pos5 = $data_pos_footer5 + count($data);
                    $footer_pos6 = $data_pos_footer6 + count($data);
                    $footer_pos7 = $data_pos_footer7 + count($data);
                    $footer_pos8 = $data_pos_footer8 + count($data);
                    $footer_pos9 = $data_pos_footer9 + count($data);
                    $footer_pos10 = $data_pos_footer10 + count($data);
                    $footer_pos11 = $data_pos_footer11 + count($data);
                    $footer_pos12 = $data_pos_footer12 + count($data);
                    $footer_pos13 = $data_pos_footer13 + count($data);
                    $footer_pos14 = $data_pos_footer14 + count($data);
                    $footer_pos15 = $data_pos_footer15 + count($data);
                    $footer_pos16 = $data_pos_footer16 + count($data);
                    $footer_pos17 = $data_pos_footer17 + count($data);
                    $footer_pos18 = $data_pos_footer18 + count($data);
                    $footer_pos19 = $data_pos_footer19 + count($data);
                    $footer_pos20 = $data_pos_footer20 + count($data);
                    $footer_pos21 = $data_pos_footer21 + count($data);
                    $footer_pos22 = $data_pos_footer22 + count($data);
                    $footer_pos23 = $data_pos_footer23 + count($data);
                    $footer_pos24 = $data_pos_footer24 + count($data);
                    $footer_pos25 = $data_pos_footer25 + count($data);
                    $footer_pos26 = $data_pos_footer26 + count($data);
                    $footer_pos27 = $data_pos_footer27 + count($data);
                    $footer_pos28 = $data_pos_footer28 + count($data);
                    $footer_pos29 = $data_pos_footer29 + count($data);

            		$main_data_border_range_row = 'A'.$data_pos.':J'.$data_pos;	
            		$main_data_border_range_col = 'G'.$data_pos;
            		$main_data_border_range_col2 = 'H'.$data_pos;	
            		$main_data_border_range_col3 = 'I'.$data_pos;	


            		$event->sheet->getStyle($main_data_border_range_row)->applyFromArray($styleBorderThin);    
            		$event->sheet->getStyle($main_data_border_range_col)->applyFromArray($styleBorderThin);  
            		$event->sheet->getStyle($main_data_border_range_col2)->applyFromArray($styleBorderThin);  
            		$event->sheet->getStyle($main_data_border_range_col3)->applyFromArray($styleBorderThin);  
            	}

                $sub_header_border_range_row = 'A13:J13';   
                $main_data_border_range_col = 'G13';  
                $main_data_border_range_col2 = 'H13';
                $main_data_border_range_col3 = 'I13';
                $main_data_border_range_col4 = 'J13';
                $main_footer_border_range_row = 'A'.$footer_pos.':H'.$footer_pos;   
                $main_footer_border_range_row2 = 'A'.$footer_pos2.':H'.$footer_pos2;   
                $main_footer_border_range_row3 = 'A'.$footer_pos3.':H'.$footer_pos3;   
                $main_footer_border_range_row4 = 'A'.$footer_pos4.':H'.$footer_pos4;   
                $main_footer_border_range_row5 = 'A'.$footer_pos5.':H'.$footer_pos5;   
                $main_footer_border_range_row6 = 'A'.$footer_pos6.':H'.$footer_pos6;   
                $main_footer_border_range_row7 = 'A'.$footer_pos7.':H'.$footer_pos7;   
                $main_footer_border_range_row8 = 'A'.$footer_pos8.':H'.$footer_pos8;   
                $main_footer_border_range_row9 = 'A'.$footer_pos9.':H'.$footer_pos9;   
                $main_footer_border_range_row10 = 'A'.$footer_pos10.':H'.$footer_pos10;   
                $main_footer_border_range_row11 = 'A'.$footer_pos11.':H'.$footer_pos11;   
                $main_footer_border_range_row12 = 'A'.$footer_pos12.':H'.$footer_pos12;
                $main_footer_border_range_row13 = 'A'.$footer_pos13.':H'.$footer_pos13;   
                $main_footer_border_range_row14 = 'A'.$footer_pos14.':H'.$footer_pos14;    
                $main_footer_border_range_row15 = 'A'.$footer_pos15.':H'.$footer_pos15;   
                $main_footer_border_range_row16 = 'A'.$footer_pos16.':H'.$footer_pos16;   
                $main_footer_border_range_row17 = 'A'.$footer_pos17.':H'.$footer_pos17;
                $main_footer_border_range_row18 = 'A'.$footer_pos18.':H'.$footer_pos18;   
                $main_footer_border_range_row19 = 'A'.$footer_pos19.':H'.$footer_pos19;    
                $main_footer_border_range_row20 = 'A'.$footer_pos20.':H'.$footer_pos20;   
                $main_footer_border_range_row21 = 'A'.$footer_pos21.':H'.$footer_pos21;   
                $main_footer_border_range_row22 = 'A'.$footer_pos22.':H'.$footer_pos22;
                $main_footer_border_range_row23 = 'A'.$footer_pos23.':H'.$footer_pos23;   
                $main_footer_border_range_row24 = 'A'.$footer_pos24.':H'.$footer_pos24;    
                $main_footer_border_range_row25 = 'A'.$footer_pos25.':H'.$footer_pos25;   
                $main_footer_border_range_row26 = 'A'.$footer_pos26.':H'.$footer_pos26;    
                $main_footer_border_range_row27 = 'A'.$footer_pos27.':H'.$footer_pos27;   
                $main_footer_border_range_row28 = 'A'.$footer_pos28.':H'.$footer_pos28;    
                $main_footer_border_range_row29 = 'A'.$footer_pos29.':H'.$footer_pos29;

                $event->sheet->getStyle($sub_header_border_range_row)->applyFromArray($styleBorderThin);               
                $event->sheet->getStyle($main_data_border_range_col)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_data_border_range_col2)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_data_border_range_col3)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_data_border_range_col4)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row2)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row3)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row4)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row5)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row6)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row7)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row8)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row9)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row10)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row11)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row12)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row13)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row14)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row15)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row16)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row17)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row18)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row19)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row20)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row21)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row22)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row23)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row24)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row25)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row26)->applyFromArray($styleBorderThin);   
                $event->sheet->getStyle($main_footer_border_range_row27)->applyFromArray($styleBorderThin);
                $event->sheet->getStyle($main_footer_border_range_row28)->applyFromArray($styleBorderThin);     
                $event->sheet->getStyle($main_footer_border_range_row29)->applyFromArray($styleBorderBottomThin);                           
            },
        ];
    }

    public function title(): string
    {
        return 'TRF';
    }
}
