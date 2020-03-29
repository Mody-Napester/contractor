<?php

namespace App\Http\Controllers;

use App\Enums\LeadsStatuses;
use App\Exports\LeadsExport;
use App\Imports\LeadsImport;
use App\Lead;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Illuminate\Http\Request;

class LeadsController extends Controller
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
        $this->resource = new Lead();
    }

    // Export Leads
    public function export()
    {
        return Excel::download(new LeadsExport(), 'users.xlsx');
    }

    // Import Leads
    public function import(Request $request)
    {
        Excel::import(new LeadsImport(), $request->file('selected_file'));

        // Return
        $data['message'] = [
            'msg_status' => 1,
            'type' => 'success',
            'text' => 'Uploaded Successfully',
        ];
        return back()->with('message', $data['message']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $status = null)
    {
        if (!User::hasAuthority('index.leads')){
            return redirect('/');
        }

        $data['sales'] = User::all();

        $data['resources'] = new Lead();

        if(empty($request->all())){
            if(in_array($status, [1,2,3,4])){
                $data['resources'] = $data['resources']->where('status', $status);
            }else{
                if(User::hasAuthority('mainuser.type')){
                    $data['resources'] = $data['resources']->where('status', 2); // Done
                }
                elseif (User::hasAuthority('reviewer.type')){
                    $data['resources'] = $data['resources']->where('status', 1)->orWhere('status', 3); // New & Duplicates
                }
            }
        }else{
            if($request->has('company_name') && $request->company_name != ''){$data['resources'] = $data['resources']->where('company_name', $request->company_name );}
            if($request->has('owner') && $request->owner != ''){$data['resources'] = $data['resources']->where('owner', $request->owner );}
            if($request->has('sub_type') && $request->sub_type != ''){$data['resources'] = $data['resources']->where('sub_type', $request->sub_type );}
            if($request->has('contact_engineer') && $request->contact_engineer != ''){$data['resources'] = $data['resources']->where('contact_engineer', $request->contact_engineer );}
            if($request->has('title') && $request->title != ''){$data['resources'] = $data['resources']->where('title', $request->title );}
            if($request->has('class') && $request->class != ''){$data['resources'] = $data['resources']->where('class', $request->class );}
            if($request->has('mobile_1') && $request->mobile_1 != ''){$data['resources'] = $data['resources']->where('mobile_1', $request->mobile_1 );}
            if($request->has('mobile_2') && $request->mobile_2 != ''){$data['resources'] = $data['resources']->where('mobile_2', $request->mobile_2 );}
            if($request->has('email') && $request->email != ''){$data['resources'] = $data['resources']->where('email', $request->email );}
            if($request->has('address') && $request->address != ''){$data['resources'] = $data['resources']->where('address', $request->address );}
            if($request->has('tel') && $request->tel != ''){$data['resources'] = $data['resources']->where('tel', $request->tel );}
            if($request->has('sales1') && $request->sales1 != ''){$data['resources'] = $data['resources']->where('created_by', $request->sales1 );}
            if($request->has('sales2') && $request->sales2 != ''){$data['resources'] = $data['resources']->where('user_id', $request->sales2 );}

            $data['resources'] = $data['resources']->where('status', 2); // Done
        }

        $data['resources'] = $data['resources']->paginate(50);

        return view('leads.index', $data);
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
        if (!User::hasAuthority('store.leads')){
            return redirect('/');
        }

        // Check validation
        $validator = Validator::make($request->all(), [
            'owner' => 'required|string|max:255',
            'mobile_1' => 'required|max:20',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Check if duplicated
        $dup = Lead::where(function($query) use ($request){
            if($request->mobile_1 != ''){
                $query->where('mobile_1', $request->mobile_1);
                $query->orWhere('mobile_2', $request->mobile_1);
            }
            if($request->mobile_2 != ''){
                $query->orWhere('mobile_1', $request->mobile_2);
                $query->orWhere('mobile_2', $request->mobile_2);
            }
            $query->orWhere('email', $request->email);
        })->first();

        // Do Code
        $resource = Lead::store([
            'company_name' => $request->company_name,
            'owner' => $request->owner,
            'sub_type' => $request->sub_type,
            'contact_engineer' => $request->contact_engineer,
            'title' => $request->title,
            'class' => ($request->has('class'))? $request->class : '',
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'notes' => $request->notes,
            'status' => ($dup)? 3 : 1,
            'duplicated_with' => ($dup)? $dup->id : '',
            'user_id' => ($request->has('user'))? $request->user : null,
            'created_by' => auth()->user()->id,
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!User::hasAuthority('show.leads')){
            return redirect('/');
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
        if (!User::hasAuthority('edit.leads')){
            return redirect('/');
        }

        $data['resource'] = Lead::getBy('uuid', $uuid);
        $data['sales'] = User::all();

        return response([
            'title'=> "Update resource " . $data['resource']->name,
            'view'=> view('leads.edit', $data)->render(),
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
        if (!User::hasAuthority('update.leads')){
            return redirect('/');
        }

        // Get Resource
        $resource = Lead::getBy('uuid', $uuid);

        // Check validation
        $validator = Validator::make($request->all(), [
            'owner' => 'required|string|max:255',
            'mobile_1' => 'required|max:20',
            'email' => 'required|string|email|max:255',
        ]);

        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        // Do Code
        $updatedResource = Lead::edit([
            'company_name' => $request->company_name,
            'owner' => $request->owner,
            'sub_type' => $request->sub_type,
            'contact_engineer' => $request->contact_engineer,
            'title' => $request->title,
            'class' => ($request->has('class'))? $request->class : '',
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'email' => $request->email,
            'address' => $request->address,
            'tel' => $request->tel,
            'notes' => $request->notes,
            'user_id' => ($request->has('user'))? $request->user : auth()->user()->id,
            'status' => ($request->has('status'))? $request->status : $resource->status,
            'updated_by' => auth()->user()->id
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
        if (!User::hasAuthority('delete.leads')){
            return redirect('/');
        }

        $resource = Lead::getBy('uuid', $uuid);
        if ($resource){
            $deletedResource = Lead::remove($resource->id);

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
                'text' => 'Lead not exists',
            ];
        }

        return back()->with('message', $data['message']);

    }


    /**
     * Mass Edit.
     */
    public function massEdit(Request $request)
    {
        if (!User::hasAuthority('mass_edit.leads')){
            return redirect('/');
        }

        if(count($request->leads) > 0){
            foreach ($request->leads as $lead){
                $c_lead = Lead::getBy('id', $lead);

                Lead::edit([
                    'class' => ($request->has('mass_class'))? $request->mass_class : $c_lead->class,
                    'transfer_to' => ($request->has('mass_user'))? $request->mass_user : $c_lead->transfer_to,
                    'updated_by' => auth()->user()->id
                ], $lead);
            }

            $data['message'] = [
                'msg_status' => 1,
                'type' => 'success',
                'text' => 'Updated Successfully',
            ];
        }else{
            $data['message'] = [
                'msg_status' => 0,
                'type' => 'danger',
                'text' => 'Please Select Leads, Class or Transfer to',
            ];
        }

        return back()->with('message', $data['message']);

    }

    /**
     * Make Done.
     */
    public function makeDone()
    {
        if (!User::hasAuthority('make_done.leads')){
            return redirect('/');
        }

        Lead::where('status', 1)->update(['status' => 2]);

        $data['message'] = [
            'msg_status' => 1,
            'type' => 'success',
            'text' => 'Made Done Successfully',
        ];

        return back()->with('message', $data['message']);

    }
}
