<?php

namespace App\Http\Controllers;

use App\Helpers\ValueHelper;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function show()
    {
        $data = [
            'products' => Product::with('productType')->get(),
        ];

        return view('products.index', compact('data'));
    }

    public function create()
    {
        $data = [
            'productTypes'       => ProductTypes::all(),
            'productTypesSelect' => $this->getProductTypesSelect(),
        ];

        return view('products.create', compact('data'));
    }

    public function store(ProductRequest $request)
    {
        $inputs          = $request->except(['_token']);
        $inputs['value'] = ValueHelper::toDbValue($inputs['value']);
        $created         = Product::create($inputs);

        if ($created) {
            Session::flash('success-feedback', 'Registro salvo com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao salvar o registro!');
        }

        return Redirect::route('products.show');
    }

    public function edit(Product $product)
    {
        $product->value = ValueHelper::toBrValue($product->value);

        $data = [
            'product'            => $product,
            'productTypesSelect' => $this->getProductTypesSelect(),
        ];

        return view('products.edit', compact('data'));
    }

    public function update(Product $product, Request $request)
    {
        $inputs          = $request->except(['_method', '_token']);
        $inputs['value'] = ValueHelper::toDBValue($inputs['value']);
        $updated         = $product->update($inputs);

        if ($updated) {
            Session::flash('success-feedback', 'Registro atualizado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao atualizar o registro!');
        }

        return Redirect::route('products.show');
    }

    public function delete(Product $product)
    {
        $deleted = $product->delete();

        if ($deleted) {
            Session::flash('success-feedback', 'Registro deletado com sucesso!');
        } else {
            Session::flash('error-feedback', 'Problemas ao deletar o registro!');
        }

        return Redirect::route('products.show');
    }

    private function getProductTypesSelect()
    {
        $productTypes = ProductTypes::all();

        $return[] = 'Escolha uma opção';

        foreach ($productTypes as $productType) {
            $return[$productType->id] = $productType->description;
        }

        return $return;
    }
}
