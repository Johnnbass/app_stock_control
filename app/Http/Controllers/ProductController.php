<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Return the specified product data from products table
     * 
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    private function find($id)
    {
        return $this->product->with(['vendor', 'category'])->find($id);
    }

    /**
     * sets json response error
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function setError()
    {
        return response()->json([
            'error' => 'Não foi possível concluir a operação. Registro não encontrado.'
        ], 404);
    }

    /**
     * Validate fields
     * 
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function validateForm($request)
    {
        $rules = $this->product->rules();
        $feedback = $this->product->feedback();

        if ($request->method() === 'PATCH') {
            $dRules = array();

            foreach ($rules as $input => $rule) {
                if (array_key_exists($input, $request->all())) {
                    $dRules[$input] = $rule;
                }
            }
            $rules = $dRules;
        }

        $request->validate($rules, $feedback);
    }

    /**
     * generate the SKU code
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return String
     */
    private function generateSku($request)
    {
        $timestamp = time();

        $vendor = $this->caractersProcessing(Vendor::find($request->get('vendor_id'))->name);
        $category = $this->caractersProcessing(Category::find($request->get('category_id'))->name);
        $product = $this->caractersProcessing($request->get('name'));;
        
        return "{$vendor} {$category} {$product} {$timestamp}";
    }

    protected function caractersProcessing($string)
    {
        $chars = [' ', 'a', 'e', 'i', 'o', 'u'];
        return strtoupper(substr(str_replace($chars, '', $string), 0, 3));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $product = $this->product->with(['vendor', 'category'])->get();
        if ($product->count() === 0) {
            return $this->setError();
        }

        return response()->json($product, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $product = $this->product;
        $product->vendor_id = $request->get('vendor_id');
        $product->category_id = $request->get('category_id');
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->sku = $this->generateSku($request);
        $product->save();

        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $product = $this->find($id);
        if ($product === null) {
            return $this->setError();
        }

        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $product = $this->find($id);
        if ($product === null) {
            return $this->setError();
        }

        $this->validateForm($request);

        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $product = $this->find($id);
        if ($product === null) {
            return $this->setError();
        }

        $product->delete();

        return response()->json(['msg' => 'O produto foi excluído com sucesso'], 200);
    }
}
