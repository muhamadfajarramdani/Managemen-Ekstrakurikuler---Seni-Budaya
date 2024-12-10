<?php

namespace App\Exports;

use App\Models\SeniBudaya;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SeniBudayaExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SeniBudaya::orderBy('created_at', 'DESC')->get();
    }

    public function headings(): array
    {
        //membuat th
        return [
            'No',
            'ID',
            'Nama Seni Budaya',
            'Pembimbing',
            'Jadwal',
            'Waktu',
        ];
    }

    private $rowNumber = 1;

    public function map($senibudayas): array
    {
        return [
            $this->rowNumber++,
            $senibudayas->id,
            $senibudayas->nama,
            $senibudayas->pembimbing,
            $senibudayas->jadwal,
            \Carbon\Carbon::parse($senibudayas->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY'),
        ];
    }
}
