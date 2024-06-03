{{ Form::open(['method' => 'GET']) }}
    <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('city', __('message.select_name',[ 'select' => __('message.city') ]), [ 'class' => 'form-control-label' ]) }}
            {{ Form::select('city', isset($city) ? [ $city  => $city ] : [], old('city'), [
                'class' => 'select2Clear form-group property_city',
                'data-placeholder' => __('message.select_name',[ 'select' => __('message.city') ]),
                'data-ajax--url' => route('ajax-list', [ 'type' => 'property-city' ]),
            ]) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('customer', __('message.select_name',[ 'select' => __('message.customer') ]), [ 'class' => 'form-control-label' ]) }}
            {{ Form::select('customer', isset($customer) ? [ $customer->id  => $customer->display_name ] : [], old('customer'), [
                'class' => 'select2Clear form-group customer',
                'data-placeholder' => __('message.select_name',[ 'select' => __('message.customer') ]),
                'data-ajax--url' => route('ajax-list', ['type' => 'customer']),
            ]) }}
        </div>
        <div class="form-group col-md-2 mt-1"> 
            <button class="btn btn-primary mt-4">{{ __('message.submit') }}</button>
        </div>
    </div>
{{ Form::close() }}
