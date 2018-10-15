<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class SalesController extends Controller
{
    public function show()
    {
        $data = [
            'sales'         => $this->calcTotalOfSale(),
            'salesProducts' => SaleProduct::all(),
        ];

        return view('sales.index', compact('data'));
    }

    public function create()
    {
        $productsIn = !isset(Session::get('sale')['productsIds']) ? [] : Session::get('sale')['productsIds'];

        $data = [
            'code'     => Sale::generteCodeSale(),
            'products' => Product::with('productType')->whereNotIn('id', $productsIn)->get(),
        ];


        return view('sales.create', compact('data'));
    }

    public function search(Sale $sale)
    {
        $sale->load('user');

        $data = [
            'sale'  => $sale,
            'sales' => Sale::getSaleByProducts($sale->id)
        ];

        return view('sales.search', compact('data'));
    }

    public function store(Request $request)
    {
        $inputs = $request->except(['_token']);

        $sale = Session::get('sale');

        $saleCreated = Sale::create([
            'code'     => $sale['code'],
            'users_id' => Auth::id(),
        ]);

        $created = [];

        if ($saleCreated) {
            //Insere os produtos selecionados
            foreach ($sale['productsIds'] as $productId) {

                //Insere a quantia de vezes conforme parâmetro quantidade
                for ($i = 0; $i < (int) $inputs['amount-'.$productId]; $i++) {

                    $product = Product::find($productId)->with('productType')->first();

                    $created[] = SaleProduct::create([
                        'products_id' => $productId,
                        'sales_id'    => $saleCreated->id,
                        'value'       => $product->value,
                        'tax'         => $product->productType->tax,
                    ]);
                }
            }
        }

        //Cleaning session data
        Session::forget('sale');
        Session::forget('saleJson');

        if (!in_array(false, $created)) {
            Session::flash('success-feedback', 'Registros salvos com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao salvar os registros!');
        }

        return Redirect::route('sales.show');
    }

    public function delete(Sale $sale)
    {
        $salesProductsDeleted = SaleProduct::where('sales_id', $sale->id)->delete();

        if ($salesProductsDeleted) {
            $saleDeleted = $sale->delete();
        }

        if ($saleDeleted) {
            Session::flash('success-feedback', 'Registro deletado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao deletar o registro!');
        }

        return Redirect::route('sales.show');
    }

    //Guarda na sessão as informações sobre os produtos adicionados
    public function addProductsAjax(Request $request)
    {
        $productsIds = [];
        $productsIds = json_decode($request->get('productsIds'));
        $code        = $request->get('code');

        //Adiciona o que já existe na sessao
        if (count(Session::get('sale')['productsIds']) > 0) {
            foreach (Session::get('sale')['productsIds'] as $productsIdSession) {
                $productsIds[] = $productsIdSession;
            }
        }

        $dataSale = [
            'code'        => $code,
            'productsIds' => $productsIds
        ];

        Session::put('sale', $dataSale);

        $sale = Session::get('sale');

        $data = [];

        //Adiciona
        if ($sale['productsIds']) {
            foreach ($sale['productsIds'] as $productsId) {
                $product = Product::with('productType')->find($productsId);
                $data[] = [
                    'opcao' => view('sales.parts.delete-product', [
                        'href' => route('sales.dataTablesRemove'),
                        'id'   => $product->id,
                    ])->render(),
                    'productName'  => $product->name,
                    'productValue' => "<span id='productValue-$productsId'>".$product->value."</span>",
                    'tax'          => "<span id='productTax-$productsId'>".$product->productType->tax."</span>",
                    'amount'       => view('sales.parts.amount', [
                        'id' => $product->id,
                    ])->render(),
                    'total'        => "<span id='productTotal-$productsId'>".($product->value + ($product->value * ($product->productType->tax / 100)))."</span>",
                    'productId'    => $product->id,
                ];
            }
        }

        $dataJson = json_encode($data);

        //adiciona um json na sessão com as informações dos produtos
        Session::put('saleJson', $dataJson);

        return Session::get('saleJson');
    }

    //Chamada na inicialização do datatables
    public function dataTables()
    {
        $sale = Session::get('sale');

        $data = [];

        if (isset($sale['productsIds']) and count($sale['productsIds']) > 0) {
            foreach ($sale['productsIds'] as $productsId) {
                $product = Product::with('productType')->find($productsId);
                $data[] = [
                    'opcao' => view('sales.parts.delete-product', [
                        'href' => route('sales.dataTablesRemove'),
                        'id'   => $product->id,
                    ])->render(),
                    'productName'  => $product->name,
                    'productValue' => "<span id='productValue-$productsId'>".$product->value."</span>",
                    'tax'          => "<span id='productTax-$productsId'>".$product->productType->tax."</span>",
                    'amount'       => view('sales.parts.amount', [
                        'id' => $product->id,
                    ])->render(),
                    'total'        => "<span id='productTotal-$productsId'>".($product->value + ($product->value * ($product->productType->tax / 100)))."</span>",
                    'productId'    => $product->id,
                ];
            }
        }

        $dataJson = json_encode($data);

        //adiciona um json na sessão com as informações dos produtos
        Session::put('saleJson', $dataJson);

        return $dataJson;
    }

    //Remove um produto da venda
    public function dataTablesRemove(Request $request)
    {
        $inputs  = $request->all();
        $saleAll = Session::get('sale')['productsIds'];

        if ($saleAll) {
            foreach ($saleAll as $key => $productId) {
                if ($inputs['productId'] == $productId) {
                    unset($saleAll[$key]);
                }
            }
        }

        $dataSale = [
            'code' => Session::get('sale')['code'],
            'productsIds' => $saleAll,
        ];

        Session::put('sale', $dataSale);
        return Redirect::route('sales.create');
    }

    private function calcTotalOfSale()
    {
        $sales = Sale::with('salesProducts')->get();

        if (isset($sales) and $sales->count() > 0) {
            foreach ($sales as $sale) {
                $saleInformation = Sale::getSaleByProducts($sale->id);

                $totalOfSale = 0;

                foreach ($saleInformation as $saleInf) {
                    $totalOfSale += ($saleInf->value * $saleInf->amount) + ($saleInf->value * $saleInf->amount) * ($saleInf->tax / 100);
                }

                $sale->totalOfSale = $totalOfSale;
            }
        }

        return $sales;
    }
}
