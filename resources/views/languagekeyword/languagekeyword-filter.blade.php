{{ Form::open(['method' => 'GET']) }}
    <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('screen', __('message.select_name',[ 'select' => __('message.screen') ]), [ 'class' => 'form-control-label' ]) }}
            {{ Form::select('screen', isset($screen) ? [ $screen->screenId  => $screen->screenName ] : [], old('screen'), [
                'class' => 'select2Clear form-group screen',
                'data-placeholder' => __('message.select_name',[ 'select' => __('message.screen') ]),
                'data-ajax--url' => route('ajax-list', [ 'type' => 'screen' ]),
            ]) }}
        </div>
        <div class="form-group col-md-2 mt-1"> 
            <button class="btn btn-primary mt-4">{{ __('message.submit') }}</button>
        </div>
    </div>
{{ Form::close() }}
