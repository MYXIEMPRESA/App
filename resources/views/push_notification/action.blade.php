<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['pushnotification.destroy', $id], 'method' => 'delete','data--submit'=>'pushnotification'.$id]) }}
    @if($auth_user->can('push notification-delete'))
        <div class="d-flex justify-content-end align-items-center">    
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="pushnotification{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.pushnotification') ]) }}"
                title="{{ __('message.delete_form_title',[ 'form'=>  __('message.pushnotification') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    @endif
{{ Form::close() }}