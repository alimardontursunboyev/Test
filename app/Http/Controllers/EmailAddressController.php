<?php

namespace App\Http\Controllers;

use App\Models\EmailAddress;
use App\Models\PhoneNumber;
use Illuminate\Http\Request;

class EmailAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return EmailAddress::paginate(env('PG'));
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
            EmailAddress::create([
                'user_id'=>$request->get('user_id'),
                'email_address'=>$request->get('email_address')
            ]);
            return response()->json(['message' => 'E-mail address successfully created!'], 200, []);
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
        return EmailAddress::find($id);
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
            EmailAddress::find($id)->update($request->all());
            return response()->json(['message' => 'E-mail address successfully updated!'], 200, []);
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
            EmailAddress::find($id)->delete();
            return response()->json(['message' => 'E-mail address successfully deleted!'], 200, []);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500, []);
        }
    }
}
