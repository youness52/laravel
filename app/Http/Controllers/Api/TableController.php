<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TableResource;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getAll(){

        return TableResource::collection(Table::all())->response()->setStatusCode(200);
    }
}
