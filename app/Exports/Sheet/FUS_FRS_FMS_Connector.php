<?php

namespace App\Exports\Sheet;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Carbon\Carbon;

class FUS_FRS_FMS_Connector implements FromView, WithTitle
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

        return view('product_line_excel_FFFC', [
            'data' => $this->data,
        ]);
    }

    public function title(): string
    {
        return 'FUS FRS FMS Connector';
    }
}
