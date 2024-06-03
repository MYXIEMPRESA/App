<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\SubscriptionDataTable;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubscriptionDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.subscription')] );
        $auth_user = authSession();
        if (!auth()->user()->can('subscription-list')) {
            $message = __('message.demo_permission_denied');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['data-table'];
        $button = '';
        return $dataTable->render('global.datatable', compact('pageTitle', 'auth_user', 'assets', 'button'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('subscription-show')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $data = User::where('user_type','user')->findOrFail($id);

        if ($data->is_agent == null && $data->is_builder == null) {
            return redirect()->route('customer.show', ['id' => $data->id, 'type' => 'subscription']);
        }

        if ($data->is_agent == 1) {
            return redirect()->route('agent.show', ['id' => $data->id, 'type' => 'subscription']);
        }

        if ($data->is_builder == 1) {
            return redirect()->route('builder.show', ['id' => $data->id, 'type' => 'subscription']);
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
