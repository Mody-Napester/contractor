<?php

namespace App\Http\Controllers;

use App\Manual;
use App\User;
use Validator;
use Illuminate\Http\Request;

class ManualsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!User::hasAuthority('index.manuals')){
            return redirect('/');
        }
        $data['resources'] = Manual::all();
        return view('manuals.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if(User::hasAuthority('mainuser.type')){
            $id = 1;
        }
        elseif (User::hasAuthority('sales.type')){
            $id = 2;
        }
        elseif (User::hasAuthority('reviewer.type')){
            $id = 3;
        }

        if (!User::hasAuthority('show.manuals')){
            return redirect('/');
        }

        $data['manual'] = Manual::getBy('id', $id);
        if($data['manual']){
            return view('manuals.show', $data);
        }else{
            return redirect('/');
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
        if (!User::hasAuthority('update.manuals')){
            return redirect('/');
        }

        // Check validation
        $validator = Validator::make($request->all(), [
            'details' => 'required',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Get Resource
        $resource = Manual::getBy('id', $id);

        if(!$resource){
            return redirect('/');
        }

        // Do Code
        $updatedResource = Manual::edit([
            'details' => $request->details,
        ], $resource->id);

        // Return
        if ($resource){
            $data['message'] = [
                'msg_status' => 1,
                'type' => 'success',
                'text' => 'Updated Successfully',
            ];
        }else{
            $data['message'] = [
                'msg_status' => 0,
                'type' => 'danger',
                'text' => 'Error!',
            ];
        }

        // Return
        if ($resource){
            return back()->with('message', $data['message']);
        }
    }
}
