{{ Form::open(['method' => 'GET']) }}
    <div class="row">
        <div class="form-group col-md-3">
            {{ Form::label('language', __('message.select_name',[ 'select' => __('message.language') ]), [ 'class' => 'form-control-label' ]) }}
            {{ Form::select('language', isset($language) ? [ $language->id  => $language->language_name ] : [], old('language'), [
                'class' => 'select2Clear form-group language',
                'data-placeholder' => __('message.select_name',[ 'select' => __('message.language') ]),
                'data-ajax--url' => route('ajax-list', [ 'type' => 'languagetable' ]),
            ]) }}
        </div>
        <div class="form-group col-md-3">
            {{ Form::label('keyword', __('message.select_name',[ 'select' => __('message.keys') ]), [ 'class' => 'form-control-label' ]) }}
            {{ Form::select('keyword', isset($keyword) ? [ $keyword->id  => $keyword->keyword_name ] : [], old('keyword'), [
                'class' => 'select2Clear form-group keyword',
                'data-placeholder' => __('message.select_name',[ 'select' => __('message.keys') ]),
                'data-ajax--url' => route('ajax-list', [ 'type' => 'languagekeyword' ]),
            ]) }}
        </div>
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
