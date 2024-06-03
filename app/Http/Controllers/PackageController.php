<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\DataTables\PackageDataTable;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PackageDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.package')] );
        $auth_user = authSession();
        if (!auth()->user()->can('package-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $delete_checkbox_checkout = $auth_user->can('package-delete') ? '<button id="deleteSelectedBtn" checked-title = "package-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('package-add') ? '<a href="'.route('package.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.package')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('package-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.package')]);
        
        return view('package.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        if (!auth()->user()->can('package-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        if($request->property == '1' ){
            $request['property_limit'] = null;
        }
        if($request->add_property == '1' ){
            $request['add_property_limit'] = null;
        }
        if($request->advertisement == '1' ){
            $request['advertisement_limit'] = null;
        }

        $package = Package::create($request->all());
        $message = __('message.save_form', ['form' => __('message.package')]);
        if(request()->is('api/*')){
            return json_message_response(['message'=> $message , 'status' => true]);
        }
        return redirect()->route('package.index')->withSuccess($message);
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.package')]);
        $data = Package::findOrFail($id);

        return view('package.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('package-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $data = Package::findOrFail($id);
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.package')]);

        return view('package.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, $id) 
    {
        if (!auth()->user()->can('package-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        if($request->property == '1' ){
            $request['property_limit'] = null;
        }
        if($request->add_property == '1' ){
            $request['add_property_limit'] = null;
        }   
        if($request->advertisement == '1' ){
            $request['advertisement_limit'] = null;
        }        
        $package = Package::find($id);
        $message = __('message.not_found_entry', ['name' => __('message.package')]);
        if($package == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        $message = __('message.update_form', ['form' => __('message.package')]);
        $package->fill($request->all())->update();

        if(request()->is('api/*')){
            return response()->json(['status' =>  (($package != '') ? true : false) , 'message' => $message ]);
        }
        if(auth()->check()){
            return redirect()->route('package.index')->withSuccess($message);
        }
        return redirect()->back()->withSuccess($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('package-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $package = Package::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.package')]);

        if($package != '') {
            $package->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.package')]);
        }

        if(request()->is('api/*')){
                return response()->json(['status' =>  (($package != '') ? true : false) , 'message' => $message ]);
        }
        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}
