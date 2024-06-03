<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['category.destroy', $id], 'method' => 'delete','data--submit'=>'category'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('category-edit'))
            <a class="mr-2" href="{{ route('category.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.category') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif

        @if($auth_user->can('category-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="category{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.category') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.category') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}