<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\DataTables\SliderDataTable;
use App\Http\Requests\SliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SliderDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.slider')] );
        $auth_user = authSession();
        if (!auth()->user()->can('slider-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $city = request('city') ?? null;

        $delete_checkbox_checkout = $auth_user->can('slider-delete') ?'<button id="deleteSelectedBtn" checked-title = "slider-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('slider-add') ? '<a href="'.route('slider.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.slider')]).'</a>' : '';
        return $dataTable->render('global.slider-datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout','city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('slider-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.slider')]);
        
        return view('slider.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if (!auth()->user()->can('slider-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $slider = Slider::create($request->all());

        uploadMediaFile($slider,$request->slider_image, 'slider_image');

        $message = __('message.save_form', ['form' => __('message.slider')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->route('slider.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.slider')]);
        $data = Slider::findOrFail($id);

        return view('slider.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('slider-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.slider')]);
        $data = Slider::findOrFail($id);

        return view('slider.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        if (!auth()->user()->can('slider-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $slider = Slider::find($id);

        $message = __('message.not_found_entry', ['name' => __('message.slider')]);
        if($slider == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
    
        // Slider data...
        $slider->fill($request->all())->update();

        // Save slider slider_image...
        if (isset($request->slider_image) && $request->slider_image != null) {
            $slider->clearMediaCollection('slider_image');
            $slider->addMediaFromRequest('slider_image')->toMediaCollection('slider_image');
        }
    
        $message = __('message.update_form',['form' => __('message.slider')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($slider != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return redirect()->route('slider.index')->withSuccess($message);
        }
        return redirect()->back()->withSuccess(__('message.update_form',['form' => __('message.slider') ] ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('slider-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $slider = Slider::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.slider')]);

        if($slider != '') {
            $slider->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.slider')]);
        }
       
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($slider != '') ? true : false) , 'message' => $message ]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}

