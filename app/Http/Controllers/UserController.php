<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\DataTables\UserDataTable;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.sub_admin')] );
        $auth_user = authSession();
        if (!auth()->user()->can('subadmin-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];

        $delete_checkbox_checkout = $auth_user->can('subadmin-delete') ? '<button id="deleteSelectedBtn" checked-title = "users-checked" class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $pdfbutton = '<a href="'.route('download.users.list').'" class="float-right mr-1 btn btn-sm btn-info"><i class="fas fa-file-csv"></i> '.__('message.csv').'</a>';
        $button = $auth_user->can('subadmin-add') ? '<a href="'.route('users.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.sub_admin')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','pdfbutton','delete_checkbox_checkout','button'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('subadmin-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.sub_admin')]);
        $assets = ['phone'];
        $roles = Role::where('status', 1)->whereNotIn('name', ['admin','user'])->get()->pluck('name', 'name');

        return view('users.form', compact('pageTitle','assets','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if (!auth()->user()->can('subadmin-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $request['password'] = bcrypt($request->password);
        $request['username'] = $request->username ?? stristr($request->email, "@", true) . rand(100,1000);      
        $request['display_name'] = $request['first_name']." ".$request['last_name'];

        $result = User::create($request->all());
        uploadMediaFile($result,$request->profile_image, 'profile_image');
        $result->assignRole($request->user_type);

        return redirect()->route('users.index')->withSuccess(__('message.save_form', ['form' => __('message.sub_admin')]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = __('message.view_form_title',[ 'form' => __('message.sub_admin')]);
        $data = User::findOrFail($id);
        $profileImage = getSingleMedia($data, 'profile_image');

        return view('users.show', compact('pageTitle', 'data', 'profileImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('subadmin-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.sub_admin')]);
        $data = User::whereNotIn('user_type',['admin','user'])->findOrFail($id);
        $profileImage = getSingleMedia($data, 'profile_image');
        $assets = ['phone'];
        $roles = Role::where('status', 1)->whereNotIn('name', ['admin','user'])->get()->pluck('name', 'name');

        return view('users.form', compact('data', 'pageTitle', 'id', 'assets','roles','profileImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        if (!auth()->user()->can('subadmin-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $user = User::find($id);

        $request['display_name'] = $request['first_name']." ".$request['last_name'];

        $user->removeRole($user->user_type);
        $message = __('message.not_found_entry', ['name' => __('message.sub_admin')]);
        if($user == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }

        $user->fill($request->all())->update();

        if (isset($request->profile_image) && $request->profile_image != null) {
            $user->clearMediaCollection('profile_image');
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile_image');
        }

        $user->assignRole($request['user_type']);

        $message = __('message.update_form',[ 'form' => __('message.sub_admin') ]);
        
        if(auth()->check()){
           return redirect()->route('users.index')->withSuccess($message);
        }
        return redirect()->route('users.index')->withSuccess($message);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('subadmin-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $user = User::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.sub_admin')]);

        if($user != '') {
            $user->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.sub_admin')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
    public function downloadUsersList(Request $request)
    {        
        return Excel::download(new UserExport,'users'.'-'.date('Ymd_H_i_s').'.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
