<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['amenity.destroy', $id], 'method' => 'delete','data--submit'=>'amenity'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('amenity-edit'))
            <a class="mr-2" href="{{ route('amenity.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.amenity') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif

        @if($auth_user->can('amenity-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="amenity{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.amenity') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.amenity') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}