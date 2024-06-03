<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExtraPropertyLimit;
use App\DataTables\ExtraPropertyLimitDataTable;
use App\Http\Requests\ExtraPropertyLimitRequest;

class ExtraPropertyLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExtraPropertyLimitDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.extrapropertylimit')] );
        $auth_user = authSession();
        if (!auth()->user()->can('extra property limit-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $delete_checkbox_checkout = $auth_user->can('extra property limit-delete') ? '<button id="deleteSelectedBtn" checked-title = "extra-property-limit-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('extra property limit-add') ? '<a href="'.route('extrapropertylimit.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.extrapropertylimit')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('extra property limit-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.extrapropertylimit')]);
        
        return view('extrapropertylimit.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtraPropertyLimitRequest $request)
    {
        if (!auth()->user()->can('extra property limit-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $extrapropertylimit = ExtraPropertyLimit::create($request->all());
        $message = __('message.save_form', ['form' => __('message.extrapropertylimit')]);
        if(request()->is('api/*')){
            return json_message_response(['message'=> $message , 'status' => true]);
        }
        return redirect()->route('extrapropertylimit.index')->withSuccess($message);
    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.extrapropertylimit')]);
        $data = ExtraPropertyLimit::findOrFail($id);

        return view('extrapropertylimit.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('extra property limit-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $data = ExtraPropertyLimit::findOrFail($id);
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.extrapropertylimit')]);

        return view('extrapropertylimit.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtraPropertyLimitRequest $request, $id) 
    {   
        if (!auth()->user()->can('extra property limit-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $extrapropertylimit = ExtraPropertyLimit::find($id);
        $message = __('message.not_found_entry', ['name' => __('message.extrapropertylimit')]);
        if($extrapropertylimit == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        $message = __('message.update_form', ['form' => __('message.extrapropertylimit')]);
        $extrapropertylimit->fill($request->all())->update();

        if(request()->is('api/*')){
            return response()->json(['status' =>  (($extrapropertylimit != '') ? true : false) , 'message' => $message ]);
        }
        if(auth()->check()){
            return redirect()->route('extrapropertylimit.index')->withSuccess($message);
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
        if (!auth()->user()->can('extra property limit-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $extrapropertylimit = ExtraPropertyLimit::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.extrapropertylimit')]);

        if($extrapropertylimit != '') {
            $extrapropertylimit->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.extrapropertylimit')]);
        }

        if(request()->is('api/*')){
                return response()->json(['status' =>  (($extrapropertylimit != '') ? true : false) , 'message' => $message ]);
        }
        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}
