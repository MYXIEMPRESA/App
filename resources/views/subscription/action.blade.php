<?php
    $auth_user= authSession();
?>
@if(isset($action_type) && $action_type == 'user_action')
    @if( $user_data->user_type == 'user' )
        <div class="d-flex align-items-center">
            <a class="mr-2" href="{{ route('subscription.show',$user_data->id) }}">{{ $user_data->display_name }}</a>
        </div>
    @else
        {{ $user_data->display_name }}
    @endif
@endif
@if( isset($action_type) && $action_type == 'action' )
    <div class="d-flex align-items-center">
        @if($auth_user->can('subscription-show'))
            <a class="mr-2" href="{{ route('subscription.show',$user_id) }}"><i class="fas fa-eye text-secondary"></i></a>
        @endif
    </div>
@endif
