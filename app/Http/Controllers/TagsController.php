<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tags;
use App\DataTables\TagsDataTable;
use App\Http\Requests\TagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagsDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.tags')] );
        $auth_user = authSession();
        if (!auth()->user()->can('tags-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $button = $auth_user->can('tags-add') ? '<a href="'.route('tags.create').'" class="float-right btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.tags')]).'</a>' :'';
        $delete_checkbox_checkout = $auth_user->can('tags-delete') ? '<button id="deleteSelectedBtn" checked-title = "tags-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('tags-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.tags')]);
        
        return view('tags.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        if (!auth()->user()->can('tags-add')) {
            $message = __('message.permission_denied_for_account');
            if(request()->ajax()) {
                return response()->json(['status' => false, 'event' => 'validation', 'message' => $message ]);
            }
            return redirect()->back()->withErrors($message);
        }
        $tags = Tags::create($request->all());

        $message = __('message.save_form', ['form' => __('message.tags')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => $message ]);
        }
        return response()->json(['status' => true, 'event' => 'submited','message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.tags')]);
        $data = Tags::findOrFail($id);

        return view('tags.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('tags-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.tags')]);
        $data = Tags::findOrFail($id);

        return view('tags.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, $id)
    {
        if (!auth()->user()->can('tags-edit')) {
            $message = __('message.permission_denied_for_account');
            return response()->json(['status' => false,'event'=>'validation', 'message' => $message ]);
        }
        $tags = Tags::find($id);
        
        $message = __('message.not_found_entry', ['name' => __('message.tags')]);
        if($tags == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        // tags data...
        $tags->fill($request->all())->update();
        $message = __('message.update_form',['form' => __('message.tags')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($tags != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return response()->json(['status' => true, 'event' => 'submited','message'=> $message]);
            
        }
        return response()->json(['status' => true, 'event' => 'submited', 'message'=> $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('tags-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $tags = Tags::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.tags')]);

        if($tags != '') {
            $tags->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.tags')]);
        }
       
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($tags != '') ? true : false) , 'message' => $message ]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}
