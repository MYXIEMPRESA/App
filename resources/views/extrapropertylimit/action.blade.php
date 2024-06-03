
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['extrapropertylimit.destroy', $id], 'method' => 'delete','data--submit'=>'extrapropertylimit'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('extra property limit-edit'))
            <a class="mr-2" href="{{ route('extrapropertylimit.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.extrapropertylimit') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
        
        @if($auth_user->can('extra property limit-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="extrapropertylimit{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.extrapropertylimit') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.extrapropertylimit') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}