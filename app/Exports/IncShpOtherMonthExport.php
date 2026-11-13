<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncShpOtherMonthExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $export_data_other_month_billings;
    protected $start;
    protected $end;  
     
    function __construct($export_data_other_month_billings,$start,$end)
    {
        $this->export_data_other_month_billings = $export_data_other_month_billings;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $export_data_other_month_billings = $this->export_data_other_month_billings;
        $start = $this->start; 
        $end = $this->end; 

        return view('other_month_billing_report_excel', compact('export_data_other_month_billings','start','end'));
    }
}
