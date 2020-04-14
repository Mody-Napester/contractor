<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Class object
     * @var resource
     */
    public $resource;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->resource = new Company();
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $status = null)
    {
        if (!User::hasAuthority('index.companies')){
            return redirect('/');
        }
        $data['resources'] = new Company();
        $data['resources'] = $data['resources']->paginate(50);
        return view('companies.index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check permissions
        if (!User::hasAuthority('store.companies')){
            return redirect('/');
        }

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:companies',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $resource = Company::store([
            'name' => $request->name,
            'is_active' => ($request->is_active == 0)? 0 : 1,
        ]);

        // Return
        if ($resource){
            $data['message'] = [
                'msg_status' => 1,
                'type' => 'success',
                'text' => 'Created Successfully',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (!User::hasAuthority('edit.companies')){
            return redirect('/');
        }

        $data['resource'] = Company::getBy('uuid', $uuid);

        return response([
            'title'=> "Update resource " . $data['resource']->name,
            'view'=> view('companies.edit', $data)->render(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        // Check permissions
        if (!User::hasAuthority('update.companies')){
            return redirect('/');
        }

        // Get Resource
        $resource = Company::getBy('uuid', $uuid);

        // Check validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $updatedResource = Company::edit([
            'name' => ($request->has('name'))? $request->name : '',
            'is_active' => ($request->is_active == 0)? 0 : 1,
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if (!User::hasAuthority('delete.companies')){
            return redirect('/');
        }

        $resource = Company::getBy('uuid', $uuid);
        if ($resource){
            $deletedResource = Company::remove($resource->id);

            // Return
            if ($deletedResource){
                // Return
                $data['message'] = [
                    'msg_status' => 1,
                    'type' => 'success',
                    'text' => 'Deleted Successfully',
                ];
            }else{
                $data['message'] = [
                    'msg_status' => 0,
                    'type' => 'danger',
                    'text' => 'Error!',
                ];
            }
        }else{
            $data['message'] = [
                'msg_status' => 0,
                'type' => 'danger',
                'text' => 'Company not exists',
            ];
        }

        return back()->with('message', $data['message']);

    }
}
