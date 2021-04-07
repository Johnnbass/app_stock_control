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
            'msg' => 'Não foi possível concluir a operação. Registro(s) não encontrado(s).'
        ], 404);
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $report = $this->report->all();
        if ($report->count() === 0) {
            return $this->setError();
        }

        $reportData = $report->toArray();
        foreach ($reportData as $data) {
            $d[date('d-m-Y', strtotime($data['created_at']))][$data['product_sku']][$data['type']][] = $data['amount'];
        }
        asort($d);
        return response()->json($d, 200);
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
