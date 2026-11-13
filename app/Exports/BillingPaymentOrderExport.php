<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;


use App\Exports\Sheet\TRF;
use App\Exports\Sheet\ACCTNG;

class BillingPaymentOrderExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $po_and_ca_data_trf;
    protected $po_and_ca_data_acctng;


    function __construct($po_and_ca_data_trf,$po_and_ca_data_acctng)
    {
        $this->po_and_ca_data_trf = $po_and_ca_data_trf;
        $this->po_and_ca_data_acctng = $po_and_ca_data_acctng;
    }

    //for multiple sheets
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new TRF($this->po_and_ca_data_trf);
        $sheets[] = new ACCTNG($this->po_and_ca_data_acctng);

        return $sheets;
    }    

}
