<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncShpPEZAExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $export_data_peza_report;
    protected $start;
    protected $end;  
     
    function __construct($export_data_peza_report,$start,$end)
    {
        $this->export_data_peza_report = $export_data_peza_report;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $export_data_peza_report = $this->export_data_peza_report;
        $start = $this->start; 
        $end = $this->end; 

        return view('peza_report_excel', compact('export_data_peza_report','start','end'));
    }
}
