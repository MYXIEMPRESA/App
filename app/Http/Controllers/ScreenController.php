<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ScreenDataTable;
use App\Models\Screen;
use App\Http\Requests\ScreenRequest;

class ScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ScreenDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.screen')] );
        $auth_user = authSession();
        if (!auth()->user()->can('screen-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $button = '';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','button'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastscreen = Screen::latest('id')->first();
        $lastscreenId = $lastscreen ? $lastscreen->id + 1 : 1;
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.screen')]);
        
        return view('screen.form', compact('pageTitle','lastscreenId'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScreenRequest $request)
    {
        // $requestData = $request->all();

        // $screenlist = Screen::get();
        // $lastScreen = $screenlist->count();

        // $newScreenId = $lastScreen ? $lastScreen + 1 : 1;
        // $requestData['screenId'] = $newScreenId;
 
        $screen_data = Screen::create($request->all());

        $message = __('message.save_form', ['form' => __('message.screen')]);
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
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
