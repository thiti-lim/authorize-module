<?php

namespace Modules\StockManagement\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Modules\StockManagement\Models\Stock;
use Modules\StockManagement\Http\Requests\StockRequest;

class StockController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return $this->success(data: []);
    }

    public function store(StockRequest $request)
    {
        return $this->success(data: []);
    }

    public function show(Stock $stock)
    {
        return $this->success(data: []);
    }

    public function destroy(Stock $stock)
    {
        return $this->success([]);
    }
}
