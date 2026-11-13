<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class IncShpAccountingPezaLISPExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $export_data_acc_peza_lisp_espt;
    protected $export_data_acc_peza_lisp_rms;
    protected $start;
    protected $end;  
     
    function __construct($export_data_acc_peza_lisp_espt,$export_data_acc_peza_lisp_rms,$start,$end)
    {
        $this->export_data_acc_peza_lisp_espt = $export_data_acc_peza_lisp_espt;
        $this->export_data_acc_peza_lisp_rms = $export_data_acc_peza_lisp_rms;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $export_data_acc_peza_lisp_espt = $this->export_data_acc_peza_lisp_espt;
        $export_data_acc_peza_lisp_rms = $this->export_data_acc_peza_lisp_rms;
        $start = $this->start; 
        $end = $this->end; 

        return view('accounting_peza_lisp_excel', compact('export_data_acc_peza_lisp_espt','export_data_acc_peza_lisp_rms','start','end'));
    }

}
