<?php

namespace App\Http\Controllers;

use App\Helpers\ValueHelper;
use App\Http\Requests\ProductTypesRequest;
use App\Models\Product;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductTypesController extends Controller
{
    public function show()
    {
        $data = [
            'typesProduct' => ProductTypes::all(),
        ];

        return view('product-types.index', compact('data'));
    }

    public function create()
    {
        return view('product-types.create');
    }

    public function store(ProductTypesRequest $request)
    {
        $inputs        = $request->except(['_token']);
        $inputs['tax'] = ValueHelper::toDbValue($inputs['tax']);

        $created = ProductTypes::create($inputs);

        if ($created) {
            Session::flash('success-feedback', 'Registro salvo com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao salvar o registro!');
        }

        return Redirect::route('productTypes.show');
    }

    public function edit(ProductTypes $productType)
    {
        $data = [
            'productType' => $productType
        ];

        return view('product-types.edit', compact('data'));
    }

    public function update(ProductTypes $productType, Request $request)
    {
        $inputs        = $request->except(['_method', '_token']);
        $inputs['tax'] = ValueHelper::toDbValue($inputs['tax']);
        $updated       = $productType->update($inputs);

        if ($updated) {
            Session::flash('success-feedback', 'Registro atualizado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao atualizar o registro!');
        }

        return Redirect::route('productTypes.show');
    }

    public function delete(ProductTypes $productType)
    {
        $productsWithThisType = Product::where('product_types_id', $productType->id)->get()->count();

        if ($productsWithThisType > 0) {
            Session::flash('error-feedback', 'Existem produtos com esse tipo, exclua eles para poder excluir este tipo!');
            return Redirect::route('productTypes.show');
        }

        $deleted = $productType->delete();

        if ($deleted) {
            Session::flash('success-feedback', 'Registro deletado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao deletar o registro!');
        }

        return Redirect::route('productTypes.show');
    }
}
