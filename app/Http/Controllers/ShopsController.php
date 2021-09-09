<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;

class ShopsController extends Controller
{
    public function get()
    {
        $shops = Shop::all();
        return response()->json([
            'message' => 'OK',
            'data' => $shops
        ], 200);
    }
    public function getShop($id)
    {
        $data = Shop::where('id', $id)->where('name', 'description')->with('area')->get();
        return response()->json([
            'message' => 'OK',
            'data' => $data
        ], 200);
    }
    public function post(Request $request)
    {
        $param = [
            "name" => $request->name,
            "area_id" => $request->area_id,
            "genre_id" => $request->genre_id,
        ];
        DB::table('shops')->insert($param);
        return response()->json([
            'message' => 'OK',
            'data' => $param
        ], 200);
    }
}
