<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = User::orderBy('name', 'asc')->paginate(10);
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->province = $request->input(province);
        $user->telephone = $request->input(telephone);
        $user->pCode = $request->input(pCode);
        $user->salary = $request->input('salary');


        if($user->save()){
//            return response()->with('success');
            return Response::json([
                'message' => 'Joke Updated Succesfully'
            ]);
        }
        else{
            return response()->with('error');
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
        $user= User::find($id);
        if ($user != null) {
            return $user;
        }
        else{
            return response()->with('error', 'Could not find the requested user!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //will populate the fields for user to edit and come back and call update method below
        $user= User::find($id);
        if ($user != null) {
            return $user;
        }
        else{
            return response()->with('error', 'Could not find the requested user!');
        }
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
        //This will update the record matching the id.
        $user= User::find($id);
        if ($user != null) {
            $user->name = $request->input('name');
            $user->province = $request->input(province);
            $user->telephone = $request->input(telephone);
            $user->pCode = $request->input(pCode);
            $user->salary = $request->input('salary');
            if($user->save()){
                return response()->with('success');
            }
            else{
                return response()->with('error');
            }
        }
        else{
            return response()->with('error', 'Could not find the requested user!');
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
        //
        $user = User::find($id)->first();
        if($user->delete()) {
            return response('succcess');
        }
        else{
            return response('Error');
        }
    }
}
