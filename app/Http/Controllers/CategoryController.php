<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Return the specified category data from categories table
     * 
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    private function find($id)
    {
        return $this->category->with(['products'])->find($id);
    }

    /**
     * sets json response error
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    private function setError()
    {
        return response()->json([
            'msg' => 'Não foi possível concluir a operação. Registro não encontrado.'
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
        $rules = $this->category->rules();
        $feedback = $this->category->feedback();

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
        $category = $this->category->with(['products'])->get();
        if ($category->count() === 0) {
            return $this->setError();
        }
        return response()->json($category, 200);
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

        $category = $this->category->create($request->all());

        return response()->json($category, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = $this->find($id);
        if ($category === null) {
            return $this->setError();
        }
        
        return response()->json($category, 200);
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
        $category = $this->find($id);
        if ($category === null) {
            return $this->setError();
        }

        $this->validateForm($request);

        $category->update($request->all());

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = $this->find($id);
        if ($category === null) {
            return $this->setError();
        }

        $category->delete();
        
        return response()->json(['msg' => 'A categoria foi excluída com sucesso'], 200);
    }
}
