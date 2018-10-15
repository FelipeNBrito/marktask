<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultRequest;
use App\Models\Sale;
use Barryvdh\DomPDF\PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ConsultController extends Controller
{
    public function show()
    {
        return view('consult.index');
    }

    public function consult(ConsultRequest $request)
    {
        $inputs = $request->all();

        if (count($inputs) > 0) {
            $sale = Sale::where('code', $inputs['code'])->first();
            $sales = Sale::getSaleByProducts($sale->id);
        }

        $data = [
            'sale'  => $sale,
            'sales' => $sales,
        ];

        return view('consult.consult', compact('data'));
    }

    public function printPage($saleCode)
    {
        if (strlen($saleCode) > 0) {
            $sale = Sale::where('code', $saleCode)->first();
            $sales = Sale::getSaleByProducts($sale->id);
        }

        $data = [
            'sale' => $sale,
            'sales' => $sales
        ];

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('consult.print.report', compact('data')));
        $dompdf->render();
        return $dompdf->stream();
    }
}
