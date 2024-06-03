<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\CategoryAmenityMapping;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.category')] );
        $auth_user = authSession();
        if (!auth()->user()->can('category-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $delete_checkbox_checkout = $auth_user->can('category-delete') ? '<button id="deleteSelectedBtn" checked-title = "category-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('category-add') ? '<a href="'.route('category.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.category')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('category-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.category')]);
        
        return view('category.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (!auth()->user()->can('category-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $data = $request->all();
        if(request()->is('api/*')){
            $amenity_ids = json_decode($request->amenity_ids, true);
        }else{
            $amenity_ids = $request->amenity_ids;
        }
        $category = Category::create($data);
        foreach($amenity_ids as $value){
            $amenity_id = [
                'id'          => null, 
                'amenity_id' => $value,
                'category_id' => $category->id
            ];
                CategoryAmenityMapping::create($amenity_id);
        }
        uploadMediaFile($category,$request->category_image, 'category_image');

        $message = __('message.save_form', ['form' => __('message.category')]);

        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->route('category.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.category')]);
        $data = Category::findOrFail($id);

        return view('category.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('category-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.category')]);
        $data = Category::findOrFail($id);
        
        $selected_amenity = $data->categoryAmenityMapping->mapWithKeys(function ($item) {
            return [ $item->amenity_id => optional($item->amenity)->name ];
        });

        return view('category.form', compact('data', 'pageTitle', 'id' ,'selected_amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        if (!auth()->user()->can('category-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $category = Category::find($id);
        
        $message = __('message.not_found_entry', ['name' => __('message.category')]);
        if($category == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        // Category data...
        $category->fill($request->all())->update();

            $category->categoryAmenityMapping()->delete();

            if(request()->is('api/*')){
                $amenity_ids = json_decode($request->amenity_ids, true);
            }else{
                $amenity_ids = $request->amenity_ids;
            }
            if($amenity_ids != null) {
                foreach($amenity_ids as $value) {
                    $cotegory_facelity = [
                            'id'           => null, 
                            'amenity_id'  => $value,
                            'category_id'  => $category->id,
                    ];
                    CategoryAmenityMapping::create($cotegory_facelity);
                }
            }
        // Save category category_image...
        if (isset($request->category_image) && $request->category_image != null) {
            $category->clearMediaCollection('category_image');
            $category->addMediaFromRequest('category_image')->toMediaCollection('category_image');
        }

        $message = __('message.update_form',['form' => __('message.category')]);

        if(request()->is('api/*')){
            return response()->json(['status' =>  (($category != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return redirect()->route('category.index')->withSuccess($message);
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
        if (!auth()->user()->can('category-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }

        $category = Category::find($id);
        $property = Property::where('category_id', $id)->first();
        if (isset($property)){
            $status = 'error';
            $message = __('message.cannot_delete_associated');
        }else{
            $status = 'error';
            $message = __('message.not_found_entry', ['name' => __('message.category')]);
    
            if($category != '') {
                $category->delete();
                $status = 'success';
                $message = __('message.delete_form', ['form' => __('message.category')]);
            }
        }
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($category != '') ? true : false) , 'message' => $message ]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}

