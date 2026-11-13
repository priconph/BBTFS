<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use App\Exports\Sheet\Burn_in_Sockets;
use App\Exports\Sheet\Card_Connector;
use App\Exports\Sheet\Flexicon_Connector;
use App\Exports\Sheet\FUS_FRS_FMS_Connector;
use App\Exports\Sheet\PPS_Molding;
use App\Exports\Sheet\TC_DC_Connector;
use App\Exports\Sheet\Test_Socket;
use App\Exports\Sheet\Y_Flex;

class IncShpProductLineExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $export_product_line_bis;
    protected $export_product_line_cc;
    protected $export_product_line_fc;
    protected $export_product_line_fffc;
    protected $export_product_line_pps;
    protected $export_product_line_tdc;
    protected $export_product_line_ts;
    protected $export_product_line_yf;

    function __construct($export_product_line_bis,$export_product_line_cc,$export_product_line_fc,$export_product_line_fffc,$export_product_line_pps,$export_product_line_tdc,$export_product_line_ts,$export_product_line_yf)
    {
        $this->export_product_line_bis = $export_product_line_bis;
        $this->export_product_line_cc = $export_product_line_cc;
        $this->export_product_line_fc = $export_product_line_fc;
        $this->export_product_line_fffc = $export_product_line_fffc;
        $this->export_product_line_pps = $export_product_line_pps;
        $this->export_product_line_tdc = $export_product_line_tdc;
        $this->export_product_line_ts = $export_product_line_ts;
        $this->export_product_line_yf = $export_product_line_yf;
    }

    //for multiple sheets
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new Burn_in_Sockets($this->export_product_line_bis);
        $sheets[] = new Card_Connector($this->export_product_line_cc);
        $sheets[] = new Flexicon_Connector($this->export_product_line_fc);
        $sheets[] = new FUS_FRS_FMS_Connector($this->export_product_line_fffc);
        $sheets[] = new PPS_Molding($this->export_product_line_pps);
        $sheets[] = new TC_DC_Connector($this->export_product_line_tdc);
        $sheets[] = new Test_Socket($this->export_product_line_ts);
        $sheets[] = new Y_Flex($this->export_product_line_yf);

        return $sheets;
    }    

}
