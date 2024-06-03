
@if( $user_data->user_type == 'user' )
    <div class="d-flex align-items-center">
        <a class="mr-2" href="{{ route('property.show',[$user_data->id,'type'=>'customer']) }}">{{ $user_data->display_name }}</a>
    </div>
@else
    {{ $user_data->display_name }}
@endif
