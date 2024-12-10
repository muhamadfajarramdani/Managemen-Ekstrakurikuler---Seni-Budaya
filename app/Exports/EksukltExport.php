<?php

namespace App\Exports;

use App\Models\Ekstrakurikuler;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EksukltExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ekstrakurikuler::orderBY('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        //membuat th
        return [
            'No',
            'ID',
            'Nama Ekstrakurikuler',
            'Pembimbing',
            'Jadwal',
            'deskripsi',
            'Waktu',
        ];
    }
    private $rowNumber = 1;
    //nama',
    //'pembimbing',
    //'jadwal',
    //'deskripsi

    public function map($ekstrakurikuler): array
    {
        return [
            $this->rowNumber++,
            $ekstrakurikuler->id,
            $ekstrakurikuler->nama,
            $ekstrakurikuler->pembimbing,
            $ekstrakurikuler->jadwal,
            $ekstrakurikuler->deskripsi,
            \Carbon\Carbon::parse($ekstrakurikuler->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY'),
        ];
    }
}
