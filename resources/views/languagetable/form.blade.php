<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['languagetable.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['languagetable.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('languagetable.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    {{ Form::label('language_id', __('message.language_list').' <span class="text-danger">*</span>', ['class' => 'form-control-label'], false) }}
                                    {{ Form::select('language_id', isset($id) ? [ optional($data->LanguageDefaultList)->id => optional($data->LanguageDefaultList)->languageName ] : [], old('language_id'), [
                                            'class' => 'select2js form-group languagelist', 'id' => 'language_id',
                                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.language') ]),
                                            'data-ajax--url' => route('ajax-list', ['type' => 'languagelist']),
                                            'required'
                                        ])
                                    }}
                                </div> 
                                <div class="form-group col-md-4">
                                    {{ Form::label('language_name', __('message.language_name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('language_name', old('language_name'),[ 'placeholder' => __('message.language_name'),'class' =>'form-control','required']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('country_code', __('message.country_code').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::hidden('country_code', old('country_code'), ['id' => 'countryCodeHidden']) }}
                                    {{ Form::text('country_code', old('country_code'), ['placeholder' => __('message.country_code'), 'class' => 'form-control', 'required', 'id' => 'countryCode', 'disabled' => 'disabled']) }}

                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('language_code', __('message.language_code').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::hidden('language_code', old('language_code'), ['id' => 'languageCodeHidden']) }}
                                    {{ Form::text('language_code', old('language_code'),[ 'placeholder' => __('message.language_code'),'class' =>'form-control','required','id' => 'languageCode','disabled' => 'disabled']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',[ '1' => __('message.active'), '0' => __('message.inactive') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {!! Form::hidden('is_default',0, null, ['class' => 'form-check-input' ]) !!}
                                    {!! Form::checkbox('is_default',1, null, ['class' => 'form-check-input ml-1' ]) !!}
                                    {{ Form::label('is_default', __('message.is_default'), ['class' => 'form-control-label ml-4']) }}
                                    <label for="is_default"></label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-control-label" for="image">{{ __('message.image') }} </label>
                                    <div class="custom-file">
                                        <input type="file" name="language_image" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                    </div>
                                    <span class="selected_file"></span>
                                </div>
                                @if( isset($id) && getMediaFileExit($data, 'language_image'))
                                <div class="col-md-2 mb-2">
                                    <img id="language_image_preview" src="{{ getSingleMedia($data,'language_image') }}" alt="amenity-image" class="attachment-image mt-1">
                                    <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $data->id, 'type' => 'language_image']) }}"
                                        data--submit='confirm_form'
                                        data--confirmation='true'
                                        data--ajax='true'
                                        data-toggle='tooltip'
                                        title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                        data-title='{{ __("message.remove_file_title" , ["name" =>  __("message.image") ]) }}'
                                        data-message='{{ __("message.remove_file_msg") }}'>
                                        <i class="ri-close-circle-line"></i>
                                    </a>
                                </div>
                            @endif
                            </div>
                            <hr>
                            {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @section('bottom_script')
    <script>
        (function ($) {
            $(document).ready(function () {
                $(document).on('change', '#language_id', function () {
                var sub = $(this).val();
                LanguageList(sub);
            });

        function LanguageList(sub) {          
            var LanguageRoute = "{{ route('ajax-list', ['type' => 'language-list-data']) }}";
            $.ajax({
                url: LanguageRoute,
                data: {
                    'id': sub,
                },
                success: function (result) {
                    if (result.results) {
                        if (sub != null) {
                            $("#countryCode").val(result.results.countryCode);
                            $("#languageCode").val(result.results.languageCode);
                            $("#countryCodeHidden").val(result.results.countryCode); 
                            $("#languageCodeHidden").val(result.results.languageCode); 
                            $("#language_name").val(result.results.languageName);

                        }
                    } else {
                        console.log("No results found.");
                    }
                }
            });
        }
    });
    })(jQuery);
      </script>
    @endsection
</x-master-layout>
