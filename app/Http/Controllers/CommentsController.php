<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use Carbon\Carbon;

class CommentsController extends Controller
{
    public function postGreen(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "green_id" => $request->green_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('comments')->insert($param);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $param
        ], 200);
    }
    public function postShop(Request $request)
    {
        $now = Carbon::now();
        $param = [
            "shop_id" => $request->shop_id,
            "user_id" => $request->user_id,
            "content" => $request->content,
            "created_at" => $now,
            "updated_at" => $now
        ];
        DB::table('comments')->insert($param);
        return response()->json([
            'message' => 'Comment created successfully',
            'data' => $param
        ], 200);
    }
    public function deleteShop(Request $request)
    {
        $items = Comment::where('user_id', $request->user_id)->where('shop_id', $request->green_id)->delete();
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
        $items = Comment::where('user_id', $request->user_id)->where('green_id', $request->green_id)->delete();
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
