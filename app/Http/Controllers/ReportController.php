<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(Report $report)
    {
        $this->report = $report;
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
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->report->all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $report = $this->report->create($request->all());

        return response()->json($report, 200);
    }

}
