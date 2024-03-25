<?php

namespace Modules\Stock\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Modules\Stock\Models\Stock;
use App\Http\Controllers\Controller;
use Modules\Stock\Http\Requests\StockRequest;

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
