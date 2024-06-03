<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tags;
use App\DataTables\ArticleDataTable;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleDataTable $dataTable)
    {
        $pageTitle = __('message.list_form_title',['form' => __('message.news_article')] );
        $auth_user = authSession();
        if (!auth()->user()->can('article-list')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $assets = ['datatable'];
        $delete_checkbox_checkout = $auth_user->can('article-delete') ? '<button id="deleteSelectedBtn" checked-title = "article-checked " class="float-left btn btn-sm ">'.__('message.delete_selected').'</button>' : '';
        $button = $auth_user->can('article-add') ? '<a href="'.route('article.create').'" class="float-right btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> '.__('message.add_form_title',['form' => __('message.news_article')]).'</a>' : '';
        return $dataTable->render('global.datatable', compact('pageTitle','button','auth_user','delete_checkbox_checkout'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('article-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.add_form_title',[ 'form' => __('message.news_article')]);
        
        return view('article.form', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        if (!auth()->user()->can('article-add')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $article = Article::create($request->all());
        uploadMediaFile($article,$request->article_image, 'article_image');
        $message = __('message.save_form', ['form' => __('message.news_article')]);
        if(request()->is('api/*')){
            return json_message_response(['message'=> $message , 'status' => true]);
        }

        return redirect()->route('article.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('article-show')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }

        $pageTitle = __('message.detail_form_title',['form' => __('message.news_article')]);
        $data = Article::findOrFail($id);
        $selected_tags = [];
        if(isset($data->tags_id)){
            $selected_tags = Tags::whereIn('id', $data->tags_id)->get()->mapWithKeys(function ($item) {
                return [ $item->id => $item->name ];
            })->implode(',');
        }
        return view('article.show', compact('data','pageTitle','id','selected_tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('article-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $pageTitle = __('message.update_form_title',[ 'form' => __('message.news_article')]);
        $data = Article::findOrFail($id);
        $selected_tags = [];
        if(isset($data->tags_id)){            
            $selected_tags = Tags::whereIn('id', $data->tags_id)->get()->mapWithKeys(function ($item) {
                return [ $item->id => $item->name ];
            });
        }
        return view('article.form', compact('data', 'pageTitle', 'id','selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        if (!auth()->user()->can('article-edit')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $article = Article::find($id);

        $message = __('message.not_found_entry', ['name' => __('message.news_article')]);
        if($article == null) {
            return response()->json(['status' => false, 'message' => $message ]);
        }
        // Article data...
        $article->fill($request->all())->update();
        
        // Save article article_image...
        if (isset($request->article_image) && $request->article_image != null) {
            $article->clearMediaCollection('article_image');
            $article->addMediaFromRequest('article_image')->toMediaCollection('article_image');
        }

        $message = __('message.update_form',['form' => __('message.news_article')]);

        if(request()->is('api/*')){
            return response()->json(['status' =>  (($article != '') ? true : false) , 'message' => $message ]);
        }

        if(auth()->check()){
            return redirect()->route('article.index')->withSuccess($message);
        }
        return redirect()->route('article.show')->withSuccess($message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('article-delete')) {
            $message = __('message.permission_denied_for_account');
            return redirect()->back()->withErrors($message);
        }
        $article = Article::find($id);
        $status = 'error';
        $message = __('message.not_found_entry', ['name' => __('message.news_article')]);

        if($article != '') {
            $article->delete();
            $status = 'success';
            $message = __('message.delete_form', ['form' => __('message.news_article')]);
        }

        if(request()->is('api/*')){
                return response()->json(['status' =>  (($article != '') ? true : false) , 'message' => $message ]);
        }
        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message ]);
        }

        return redirect()->back()->with($status,$message);
    }
}
