<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['languagecontent.update', $id], 'method' => 'patch' ]) !!}
        @else
            {!! Form::open(['route' => ['languagecontent.store'], 'method' => 'post']) !!}
        @endif
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-group col-md-12">
                        {{ Form::label('language', __('message.language',[ 'select' => __('message.language') ]),[ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('language', isset($data) ? [ $data->languageTable->id => optional($data->languageTable)->language_name ] : [], old('language'), [
                                'class' => 'form-control select2 language',
                                'disabled' => true,
                        ]) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('keyword', __('message.keyword_name',[ 'select' => __('message.keyword') ]),[ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('keyword', isset($data) ? [ $data->languageKeyword->id => optional($data->languageKeyword)->keyword_name ] : [], old('keyword'), [
                                'class' => 'form-control select2 keyword',
                                'disabled' => true,
                        ]) }}
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('keyword_value', __('message.keyword_value').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                        {{ Form::text('keyword_value', old('keyword_value'),[ 'placeholder' => __('message.keyword_value'),'class' =>'form-control','required']) }}
                    </div>
                    {{-- <div class="form-group col-md-12">
                        {{ Form::label('screen_id', __('message.screen_name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                        {{ Form::select('screen_id' , isset($id) ? [ optional($data->screen)->screenId => optional($data->screen)->screenName ] : [] , old('screen_id'), [
                            'class' => 'select2 form-group', 'id' => 'screenName',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.screen_name') ]),
                            'data-ajax--url' => route('ajax-list', ['type' => 'screen']),
                            'required'
                        ])
                    }}
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit( __('message.save'), [ 'class' => 'btn btn-md btn-primary float-right', 'id' => 'btn_submit', 'data-form' => 'ajax' ]) }}
                <button type="button" class="btn btn-md btn-secondary float-right mr-1" data-dismiss="modal">{{ __('message.close') }}</button>
            </div>
        {{ Form::close() }}
    </div>
</div>
{{-- <script>
    $('#screenName').select2({
        width: '100%',
        placeholder: "{{ __('message.select_name',['select' => __('message.screen_name')]) }}",
    });
</script> --}}