<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LanguageKeyword;
use App\DataTables\LanguageKeywordDataTable;
use App\Http\Requests\LanguageKeywordRequest;
use App\Models\LanguageTable;
use App\Models\LanguageContent;
use App\Imports\ImportLanguageKeyword;
use App\Models\Screen;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Response;

class LanguageKeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LanguageKeywordDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.default_keyword')] );
        $auth_user = authSession();
        if (!auth()->user()->can('languagekeyword-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $screen = request('screen') ?? null;
        if ($screen != null) {
            $screen = Screen::where('screenId',$screen)->first();
        }
        $button = '';
        $button = $auth_user->can('languagekeyword-add') ? '<a href="'.route('languagekeyword.create').'" class="float-right btn btn-sm btn-primary loadRemoteModel"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.keys')]).'</a>' : '';
        // $download_file_button = '<a href="'.route('download.language.keyword.csv').'" class="float-right mr-1 btn btn-sm btn-secondary"><i class="fas fa-file-download"></i> '.__('message.download_language_csv').'</a>';
        // $import_file_button = '<a href="'.route('import.language.keyword.csv').'" class="float-right mr-1 btn btn-sm btn-primary loadRemoteModel"><i class="fas fa-file-import"></i> '.__('message.import_language_keyword').'</a>';
        $delete_checkbox_checkout = $auth_user->can('languagekeyword-delete') ? '<button id="deleteSelectedBtn" checked-title = "language-keyword-checked" class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        return $dataTable->render('global.languagekeyword-datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout','screen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('languagekeyword-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $lastKeyword = LanguageKeyword::latest('id')->first();
        $lastKeywordId = $lastKeyword ? $lastKeyword->id + 1 : 1;
    
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.keys')]);
        
        return view('languagekeyword.form', compact('pageTitle','lastKeywordId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageKeywordRequest $request)
    {
        if (!auth()->user()->can('languagekeyword-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $requestData = $request->all();
        $requestData['keyword_name'] = str_replace(' ', '_', $requestData['keyword_name']);
        $keywordData = LanguageKeyword::create($request->all());
    
        $language = LanguageTable::all();
        if(count($language) > 0){
            foreach($language as $value){
                $languagedata = [
                    'id' => null,
                    'keyword_id' => $keywordData->keyword_id,
                    'screen_id' => $keywordData->screen_id,
                    'language_id' => $value->id,
                    'keyword_value' => $keywordData->keyword_value,
                ];
                LanguageContent::create($languagedata);
            }
        }
        updateLanguageVersion();
        $message = __('message.save_form', ['form' => __('message.languagekeyword')]);
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
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.keys')]);
        $data = LanguageKeyword::findOrFail($id);

        return view('languagekeyword.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('languagekeyword-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.keys')]);
        $data = LanguageKeyword::findOrFail($id);
        // dd($data->Screen);
        return view('languagekeyword.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageKeywordRequest $request, $id)
    {
       
        $keys = LanguageKeyword::find($id);
        
        $message = __('message.not_found_entry', ['name' => __('message.languagekeyword')]);
        if($keys == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        // keys_table data...
        $requestData = $request->all();
        $requestData['keyword_name'] = str_replace(' ', '_', $requestData['keyword_name']);
        $keys->fill($requestData)->update();
        
        updateLanguageVersion();
        $message = __('message.update_form',['form' => __('message.languagekeyword')]);
        
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($keys != '') ? true : false) , 'message' => $message ]);
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

        $keys = LanguageKeyword::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.languagekeyword')]);

        if($keys != '') {
            $keys->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.languagekeyword')]);
        }
        updateLanguageVersion();
        if(request()->is('api/*')){
            return response()->json(['status' =>  (($keys != '') ? true : false) , 'message' => $message ]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
    // function downloadLanguageKeywordCSV() {
    //     $file = public_path(). "/download/languagekeyword.csv";
  
    //     return Response::download($file);
    // }
    // public function importLanguageKeywordForm(Request $request)
    // {    
    //     $title = __('message.import_language_keyword');
        
    //     return view('languagekeyword.import',compact([ 'title' ]));
    // }
    // public function importLanguageKeyword(Request $request)
    // {    
    //     Excel::import(new ImportLanguageKeyword, $request->file('language_keyword_file')->store('files'));
    //     $message = __('message.save_form', ['form' => __('message.languagekeyword')]);
    //     updateLanguageVersion();
    //     return response()->json(['status' => true, 'event' => 'submited','message' => $message]);
    // }
}
