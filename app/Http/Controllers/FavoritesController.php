<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function get()
    {
        $shop = Favorite::where('id')->get();
        $green = Favorite::where('id')->get();
        $data = [
            "shop" => $shop,
            "green" => $green
        ];
        return response()->json([
            'message' => "OK",
            "data" => $data
        ], 200);
    }
    public function postShop(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "shop_id" => $request->shop_id,
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => 'Favotite created successfully',
            'data' => $param
        ], 200);
    }
    public function postGreen(Request $request)
    {
        $param = [
            "user_id" => $request->user_id,
            "green_id" => $request->green_id,
        ];
        DB::table('favorites')->insert($param);
        return response()->json([
            'message' => 'Favotite created successfully',
            'data' => $param
        ], 200);
    }
    public function deleteShop(Request $request)
    {
        $items = Favorite::where('user_id', $request->user_id)->where('shop_id', $request->shop_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Favorite deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
    }
    public function deleteGreen(Request $request)
    {
        $items = Favorite::where('user_id', $request->user_id)->where('green_id', $request->green_id)->delete();
        if ($items) {
            return response()->json([
                'message' => 'Favorite deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => "Not found"
            ], 404);
        }
    }
}
