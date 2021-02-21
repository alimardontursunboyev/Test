<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\EmailAddress;
use App\Models\PhoneNumber;
use App\Models\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::paginate(env('PG')));
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

            DB::beginTransaction();

            User::create([
                'full_name'=>$request->get('full_name')
            ]);

            if($request->get('phone_number'))
            {
                PhoneNumber::create([
                    'user_id'=>User::where('full_name', $request->get('full_name'))->get('id')[0]->id,
                    'phone_number'=>$request->get('phone_number')
                ]);
            }
            if($request->get('email_address'))
            {
                EmailAddress::create([
                    'user_id'=>User::where('full_name', $request->get('full_name'))->get('id')[0]->id,
                    'email_address'=>$request->get('email_address')
                ]);
            }

            DB::commit();

            return response()->json(['message' => 'User successfully created'], 200, []);
        } catch (\Exception $exception) {
            DB::rollBack();
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
        return UserResource::collection(User::where('id',$id)->get());
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
        User::find($id)->update($request->all());
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

            DB::beginTransaction();

            User::find($id)->delete();
            PhoneNumber::where('user_id',$id)->delete();
            EmailAddress::where('user_id',$id)->delete();

            DB::commit();

            return response()->json(['message' => 'User successfully created!'], 200, []);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500, []);
        }
    }

    public function get_users()
    {
        return User::paginate(env('PG'));
    }

    public function user_search(Request $request)
    {
        $name = $request->get('name');
        return UserResource::collection(User::where('full_name','like','%'.$name.'%')->get());
    }
}
