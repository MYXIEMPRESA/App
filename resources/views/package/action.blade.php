
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['package.destroy', $id], 'method' => 'delete','data--submit'=>'package'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('package-edit'))
            <a class="mr-2" href="{{ route('package.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.package') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
        
        @if($auth_user->can('package-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="package{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.package') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.package') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}