<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LanguageTable;
use App\Models\LanguageKeyword;
use App\Models\LanguageContent;
use App\DataTables\LanguageTableDataTable;
use App\Http\Requests\LanguageTableRequest;
use App\Imports\ImportLanguageTable;
use App\Models\LanguageDefaultList;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class LanguageTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LanguageTableDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.language')] );
        $auth_user = authSession();
        if (!auth()->user()->can('language-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];

        $delete_checkbox_checkout = $auth_user->can('language-delete') ? '<button id="deleteSelectedBtn" checked-title = "language-table-checked "class="float-left btn btn-sm">'.__('message.delete_selected').'</button>' : '';
        // $download_file_button = '<a href="'.route('download.language.table.csv').'" class="float-right mr-1 btn btn-sm btn-secondary"><i class="fas fa-file-download"></i> '.__('message.download_language_csv').'</a>';
        // $import_file_button = '<a href="'.route('import.language.table.csv').'" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fas fa-file-import"></i> '.__('message.import_language').'</a>';
        $button = $auth_user->can('language-add') ? '<a href="'.route('languagetable.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.language')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('language-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }  
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.language')]);
        
        return view('languagetable.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageTableRequest $request)
    {
        if (!auth()->user()->can('language-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
    
        $language = LanguageTable::create($request->all());
        uploadMediaFile($language,$request->language_image, 'language_image');

        if ($request->is_default) {
            LanguageTable::where('id', '!=', $language->id)->update(['is_default' => 0]);
        }
        $language_keyword = LanguageKeyword::all();
        if(count($language_keyword) > 0){
            foreach($language_keyword as $value){
                $languagedata = [
                    'id' => null,
                    'keyword_id' => $value->keyword_id,
                    'screen_id' => $value->screen_id,
                    'language_id' => $language->id,
                    'keyword_value' => $value->keyword_value,
                ];
                LanguageContent::create($languagedata);
            }
        }
        updateLanguageVersion();
        $message = __('message.save_form', ['form' => __('message.language')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->route('languagetable.index')->withSuccess($message);
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
        if (!auth()->user()->can('language-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.language')]);
        $data = LanguageTable::findOrFail($id);

        return view('languagetable.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageTableRequest $request, $id)
    {
        if (!auth()->user()->can('language-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $language = LanguageTable::find($id);
        $message = __('message.not_found_entry', ['name' => __('message.language')]);

        if($language == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        if ($request->is_default) {
            LanguageTable::where('id', '!=', $language->id)->update(['is_default' => 0]);
        }
        $language->fill($request->all())->update();  

        // Save language language_image...
        if (isset($request->language_image) && $request->language_image != null) {
            $language->clearMediaCollection('language_image');
            $language->addMediaFromRequest('language_image')->toMediaCollection('language_image');
        }

        updateLanguageVersion();     
        $message = __('message.update_form',['form' => __('message.language')]);
        
        if(auth()->check()){
            return redirect()->route('languagetable.index')->withSuccess($message);
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
        if (!auth()->user()->can('language-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $language = LanguageTable::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.language')]);

        if($language != '') {
            $language->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.language')]);
        }
        updateLanguageVersion();
        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
    function downloadLanguageTableCSV() {
        $file = public_path(). "/download/language.csv";
  
        return Response::download($file);
    }
    public function importLanguageTableForm(Request $request)
    {    
        $title = __('message.import_language');
        
        return view('languagetable.import',compact([ 'title' ]));
    }
    public function importLanguageTable(Request $request)
    {    
        Excel::import(new ImportLanguageTable, $request->file('language_table_file')->store('files'));
        $message = __('message.save_form', ['form' => __('message.import_language')]);
        updateLanguageVersion();
        return response()->json(['status' => true, 'event' => 'submited','message' => $message]);
    }
}

