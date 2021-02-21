<?php

namespace App\Http\Controllers;

use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhoneNumber::paginate(env('PG'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            PhoneNumber::create([
                'user_id'=>$request->get('user_id'),
                'phone_number'=>$request->get('phone_number')
            ]);
            return response()->json(['message' => 'Phone number successfully created!'], 200, []);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500, []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PhoneNumber::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            PhoneNumber::find($id)->update($request->all());
            return response()->json(['message' => 'Phone number successfully updated!'], 200, []);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500, []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            PhoneNumber::find($id)->delete();
            return response()->json(['message' => 'Phone number successfully deleted!'], 200, []);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500, []);
        }
    }
}
