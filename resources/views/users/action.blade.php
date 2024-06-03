
<?php
    $auth_user= authSession();
?>
@if($action_type == 'status')
    <div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
        <div class="custom-switch-inner">
            <input type="checkbox" class="custom-control-input bg-success change_status" data-type="user" id="{{ $data->id }}" data-id="{{ $data->id }}" {{ ($data->status == 'inactive' ? 0 : 1) ? 'checked' : '' }} value = "{{ $data->id }}">
            <label class="custom-control-label" for="{{ $data->id }}" data-on-label="" data-off-label=""></label>
        </div>
    </div>
@endif
@if($action_type == 'action')
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('subadmin-edit'))
        <a class="mr-2" href="{{ route('users.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.users') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif
    
        @if($auth_user->can('subadmin-delete'))
        {{ Form::open(['route' => ['users.destroy', $id], 'method' => 'delete','data--submit'=>'users'.$id]) }}
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="users{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.users') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.users') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        {{ Form::close() }}
        @endif
    </div>
@endif