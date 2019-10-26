<?php

namespace App\Http;

use App\Core\Support\Controller;
use App\Services\Temperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    private $temperature;

    public function __construct(Temperature $temperature)
    {
        $this->temperature = $temperature;
    }

    public function index(Request $request)
    {
        try {
            $temperatures = $this->temperature->index($request->all());

            return response()->json(['code' => '1', 'data' => $temperatures]);
        } catch (\Exception $e) {
            return response()->json(['code' => $e->getCode(), 'data' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $params = $request->all();

            $this->temperature->store($params);

            return response()->json(['code' => '1', 'data' => $params]);
        } catch (\Exception $e) {
            return response()->json(['code' => $e->getCode(), 'data' => $e->getMessage()]);
        }
    }
}
