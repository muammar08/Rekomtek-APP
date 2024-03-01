<?php

namespace App\Exports;

use App\Models\SuratAir;
use App\Models\SuratSirtu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return SuratSirtu::all();
    // }
    use Exportable;

    public $dataAir;
    public $dataSirtu;
    public function __construct($dataAir, $dataSirtu){
        $this->dataAir = $dataAir;
        $this->dataSirtu = $dataSirtu;
    }

    public function view(): View
    {
        return view('exports.data_excel', [
            'dataAir' => $this->dataAir,
            'dataSirtu' => $this->dataSirtu
        ]);
    }
}
