
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['slider.destroy', $id], 'method' => 'delete','data--submit'=>'slider'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('slider-edit'))
            <a class="mr-2" href="{{ route('slider.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.slider') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
        
        @if($auth_user->can('slider-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="slider{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.slider') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.slider') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}