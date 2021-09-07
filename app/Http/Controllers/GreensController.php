<?php

namespace App\Http\Controllers;

use App\Models\Green;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Green::all();
        return response()->json([
            'message' => 'OK',
            'data' => $item
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Green;
        $item->user_id = $request->user_id;
        $item->image_url = $request->image_url;
        $item->description = $request->description;
        $item->save();
        return response()->json([
            'message' => 'Share created successfully',
            'data' => $item
        ], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function show(Green $green)
    {
        $item = Green::where('id', $green->id)->first();
        $favorite = DB::table('favorites')->where('green_id', $green->id)->get();
        $user_id = $item->user_id;
        $user = DB::table('users')->where('id', (int)$user_id)->first();
        $comment = DB::table('comments')->where('green_id', $green->id)->get();
        $comment_data = array();
        if (empty($comment->toArray())) {
            $items = [
                "item" => $item,
                "favorite" => $favorite,
                "comment" => $comment_data,
                "name" => $user->name,
            ];
            return response()->json($items, 200);
        }
        foreach ($comment as $value) {
            $comment_user = DB::table('users')->where('id', $value->user_id)->first();
            $comments = [
                "comment" => $value,
                "comment_user" => $comment_user
            ];
            array_push($comment_data, $comments);
        }
        $items = [
            "item" => $item,
            "favorite" => $favorite,
            "comment" => $comment_data,
            "name" => $user->name,
        ];
        return response()->json($items, 200);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Rest $rest)
    //{
    //
    //}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rest  $rest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Green $green)
    {
        $item = Green::where('id', $green->id)->delete();
        if ($item) {
            return response()->json(
                ['message' => 'Share deleted successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'Share not found'],
                404
            );
        }
    }
}
