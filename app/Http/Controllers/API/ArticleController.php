<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    public function getList(Request $request)
    {
        $article = Article::where('status',1);

        $article->when(request('name'), function ($q) {
            return $q->where('name', 'LIKE', '%' . request('name') . '%');
        });

        $article->when(request('tags_id'), function ($query) {
            return $query->whereJsonContains('tags_id', request('tags_id'));
        });
                
        $per_page = config('constant.PER_PAGE_LIMIT');
        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page))
            {
                $per_page = $request->per_page;
            }
            if($request->per_page == -1 ){
                $per_page = $article->count();
            }
        }

        $article = $article->orderBy('id', 'desc')->paginate($per_page);

        $items = ArticleResource::collection($article);
        $status ='true';

        $response = [
            'status'        => $status,
            'pagination'    => json_pagination_response($items),
            'data'          => $items
        ];
        
        return json_custom_response($response);
    }
    public function getDetail(Request $request)
    {
        $id = $request->id;

        $article = Article::where('id',$id)->first();
        if(empty($article))
        {
            $message = __('message.not_found_entry',['name' =>__('message.article')]);
            return json_message_response($message,400);   
        }

        $article_detail = new ArticleResource($article);
        $response = [
            'data' => $article_detail
        ];
        return json_custom_response($response);
    }
}
