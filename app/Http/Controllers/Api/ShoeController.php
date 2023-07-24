<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function GetAll()
    {
        $data = Shoe::orderBy('id', 'asc')->get();
        if($data){
            return response()->json([
                'status' => true,
                'message' => "Data Found",
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Data not Found"
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Create(Request $request)
    {
        $data = new Shoe;

        $rules = [
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is Less Data",
                'data' => $validator->errors()
            ], 500);
        }

        $data->name = $request->name;
        $data->brand = $request->brand;
        $data->type = $request->type;

        $create = $data->save();

        if($data){
            return response()->json([
                'status' => true,
                'message' => "Data Has Been Created",
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Cant Create Data"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function GetById(string $id)
    {
        $data = Shoe::find($id);
        if($data){
            return response()->json([
                'status' => true,
                'message' => "Data Found",
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Data not Found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function Update(Request $request, string $id)
    {
        $data = Shoe::find($id);
        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => "Data not Found"
            ], 404);
        }

        $rules = [
            'name' => 'required',
            'brand' => 'required',
            'type' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is Less Data",
                'data' => $validator->errors()
            ], 500);
        }

        $data->name = $request->name;
        $data->brand = $request->brand;
        $data->type = $request->type;

        $create = $data->save();

        return response()->json([
            'status' => true,
            'message' => "Data Has Been Updated",
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function Delete(string $id)
    {
        $data = Shoe::find($id);
        if(empty($data)) {
            return response()->json([
                'status' => false,
                'message' => "Data not Found"
            ], 404);
        }

        $delete = $data->delete();

        return response()->json([
            'status' => true,
            'message' => "Data Has Been Updated",
        ], 201);
    }
}
