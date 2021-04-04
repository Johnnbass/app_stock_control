<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * Return the specified vendor data from vendors table
     * 
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    private function find($id)
    {
        return $this->vendor->find($id);
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
        $rules = $this->vendor->rules();
        $feedback = $this->vendor->feedback();

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
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $vendor = $this->vendor->all();
        if ($vendor->count() === 0) {
            return $this->setError();
        }

        return response()->json($vendor, 200);
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

        $vendor = $this->vendor->create($request->all());

        return response()->json($vendor, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $vendor = $this->find($id);
        if ($vendor === null) {
            return $this->setError();
        }
        
        return response()->json($vendor, 200);
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
        $vendor = $this->find($id);
        if ($vendor === null) {
            return $this->setError();
        }

        $this->validateForm($request);

        $vendor->update($request->all());

        return response()->json($vendor, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $vendor = $this->find($id);
        if ($vendor === null) {
            return $this->setError();
        }

        $vendor->delete();
        
        return response()->json(['msg' => 'O fornecedor foi excluído com sucesso'], 200);
    }
}
