<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getAll(){

        return CategoryResource::collection(ItemCategory::all())->response()->setStatusCode(200);;
    }
}
