<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LanguageContentDataTable;
use App\Models\LanguageContent;
use App\Models\LanguageTable;
use App\Exports\LanguageContentExport;
use App\Models\LanguageKeyword;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\LanguageContentRequest;
use App\Imports\ImportLanguageWithKeyboard;
use App\Models\Screen;

class LanguageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LanguageContentDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.languagecontent')] );
        $auth_user = authSession();
        if (!auth()->user()->can('languagecontent-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $language = request('language') ?? null;
        $keyword = request('keyword') ?? null;
        $screen = request('screen') ?? null;
        if ($language != null) {
            $language = LanguageTable::find($language);
        }
        if ($keyword != null) {
            $keyword = LanguageKeyword::find($keyword);
        }
        if ($screen != null) {
            $screen = Screen::where('screenId',$screen)->first();
        }

        $filter_array =[
            'language' => $language,
            'keyword' => $keyword,
            'screen' => $screen
        ];

        $button = '';
        $pdfbutton = '<a href="'.route('download.language.content.list',$filter_array).'" class="float-right mr-1 btn btn-sm btn-info"><i class="fas fa-file-csv"></i> '.__('message.download_csv').'</a>';
        return $dataTable->render('global.languagecontent-datatable', compact('pageTitle','button','auth_user','language','keyword','screen','pdfbutton'));
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
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pageTitle = __('message.update_form_title',[ 'form' => __('message.languagecontent')]);
        $data = LanguageContent::findOrFail($id);

        return view('languagecontent.form', compact('data', 'pageTitle', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageContentRequest $request, $id)
    {
       
        $keys = LanguageContent::find($id);
        
        $message = __('message.not_found_entry', ['name' => __('message.languagecontent')]);
        if($keys == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        $keys->fill($request->all())->update();
        updateLanguageVersion();
        $message = __('message.update_form',['form' => __('message.languagecontent')]);

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

    }

    public function downloadLanguageContentList(Request $request)
    {        
        return Excel::download(new LanguageContentExport ,  'language-content-'.date('Ymd_H_i_s').'.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function importLanguageKeywordForm(Request $request)
    {    
        $title = __('message.languagecontent');
        
        return view('languagecontent.import',compact([ 'title' ]));
    }

    public function importlanguagewithkeyword(Request $request){
    Excel::import(new ImportLanguageWithKeyboard, $request->file('language_with_keyword')->store('files'));
    $message = __('message.save_form', ['form' => __('message.languagecontent')]);
    return redirect()->route('bulk.language.data')->withSuccess($message);

    }

    public function bulklanguagedata()
    {
        $auth_user = authSession();
        if (!auth()->user()->can('bulkimport-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.bulk_import_langugage_data');

        return view('languagecontent.bulkimport',compact([ 'pageTitle' ]));
        
    }

    public function help(){

        $pageTitle = __('message.keyword_value_bulk_upload_fields');

        return view('languagecontent.help',compact([ 'pageTitle' ]));
        
    }

    public function downloadtemplate() {
        $pageTitle = __('message.download_template');

        return view('languagecontent.downloadtemplate',compact([ 'pageTitle' ]));

    }

}
