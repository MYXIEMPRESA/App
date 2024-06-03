<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['tags.destroy', $id], 'method' => 'delete','data--submit'=>'tags'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('tags-edit'))
            <a class="mr-2 loadRemoteModel" href="{{ route('tags.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.tags') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif

        @if($auth_user->can('tags-delete'))
            <a class="mr-2 text-danger loadRemoteModel" href="javascript:void(0)" data--submit="tags{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.tags') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.tags') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}