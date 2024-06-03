<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['article.destroy', $id], 'method' => 'delete','data--submit'=>'article'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if ($auth_user->can('article-show'))
            <a class="mr-2" href="{{ route('article.show', $id) }}"><i class="fas fa-eye text-secondary"></i></a>
        @endif
        @if($auth_user->can('article-edit'))
            <a class="mr-2" href="{{ route('article.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.article') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
        @if($auth_user->can('article-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="article{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.article') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.article') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}
