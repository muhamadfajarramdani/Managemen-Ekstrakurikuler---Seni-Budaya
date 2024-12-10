<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\EksukltExport;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Http\Request;// Pastikan untuk mengimpor model ini

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function exportExcelEkstrakurikuler()
    {
        return Excel::download(new EksukltExport, 'data-ekstrakurikuler.xlsx');
    }
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        Ekstrakurikuler::create($request->all());
        return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        $ekstrakurikuler->update($request->all());

        return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();
        return redirect()->route('ekstrakurikuler.index')->with('success', 'Data berhasil dihapus');
    }


    public function downloadPDF($id)

    {

        // Mengambil data berdasarkan ID
        $ekstrakurikulers = Ekstrakurikuler::find($id)->all();
        // dd($ekstrakurikuler);

        // Berbagi data dengan view
        view()->share('ekstrakurikulers', $ekstrakurikulers);

        // Memuat view untuk diubah menjadi PDF
        $pdf = Pdf::loadView('admin.ekstrakurikuler.pdf', compact('ekstrakurikulers'));

        // Mengunduh file PDF
        return $pdf->download('detail-ekstrakurikuler.pdf');
    }




}
