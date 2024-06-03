<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['property.destroy', $id], 'method' => 'delete','data--submit'=>'property'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('property-show'))
            <a class="mr-2" href="{{ route('property.show',$id) }}"><i class="fas fa-eye text-secondary"></i></a>
        @endif
        @if($auth_user->can('property-edit'))
            <a class="mr-2" href="{{ route('property.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.property') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
        @if($auth_user->can('property-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="property{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.property') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.property') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}