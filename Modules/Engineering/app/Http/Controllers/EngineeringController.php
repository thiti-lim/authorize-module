<?php

namespace Modules\Engineering\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;

class EngineeringController extends Controller
{
    use HttpResponses; 

    public function index()
    {
        return $this->success(data: []);
    }

    public function store(Request $request)
    {
        return $this->success(data: []);
    }

    public function show($id)
    {
        return $this->success(data: []);
    }

    public function destroy($id)
    {
        return $this->success([]);
    }
}
