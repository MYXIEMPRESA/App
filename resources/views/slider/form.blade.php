<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['slider.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['slider.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('slider.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('category_id', __('message.category').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                    {{ Form::select('category_id', isset($id) ? [ optional($data->category)->id => optional($data->category)->name ] : [], old('category_id'), [
                                            'class' => 'select2js form-group category',
                                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.category') ]),
                                            'data-ajax--url' => route('ajax-list', ['type' => 'category' ]),
                                            'required'
                                        ])
                                    }}
                                </div>
                                <div class="form-group col-md-6">
                                   {{ Form::label('property_id', __('message.property').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                     {{ Form::select('property_id', [], old('property_id'), [
                                            'class' => 'select2js form-group property',
                                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.property') ]),
                                            'required'
                                        ])
                                    }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',[ '1' => __('message.active'), '0' => __('message.inactive') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="image">{{ __('message.image') }} </label>
                                    <div class="custom-file">
                                        <input type="file" name="slider_image" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                    </div>
                                    <span class="selected_file"></span>
                                </div>

                                @if( isset($id) && getMediaFileExit($data, 'slider_image'))
                                    <div class="col-md-2 mb-2">
                                        <img id="slider_image_preview" src="{{ getSingleMedia($data,'slider_image') }}" alt="slider-image" class="attachment-image mt-1">
                                        <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $data->id, 'type' => 'slider_image']) }}"
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
                                <div class="form-group col-md-12">
                                    {{ Form::label('description',__('message.description'), ['class' => 'form-control-label']) }}
                                    {{ Form::textarea('description', null, ['class'=> 'form-control tinymce-description' , 'placeholder'=> __('message.description') ]) }}
                                </div>
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
                    tinymceEditor('.tinymce-description',' ',function (ed) { }, 450)
                });        

                var state = "{{ old('property_id') ?? (isset($id) ? optional($data->property)->id : '') }}";

                var get_category_id = $('#category_id').val();
                $(document).on('change', '#category_id', function () {
                    get_category_id = $(this).val();
                    runFunctionAfterChange();
                });
                runFunctionAfterChange();

                function runFunctionAfterChange() {
                    var category = get_category_id;
                    $('#property_id').empty();
                    propertList(category);
                }
                function propertList(category) {
                    var property_category_route = "{{ route('ajax-list', ['type' => 'property-category', 'category_id' => '']) }}" + category;
                    property_category_route = property_category_route.replace('amp;', '');

                    $.ajax({
                        url: property_category_route,
                        success: function (result) {
                            var propertyId = $('#property_id');

                            propertyId.select2({
                                width: '100%',
                                placeholder: "{{ __('message.select_name', ['select' => __('message.property')]) }}",
                                data: result.results
                            });

                            if (state !== null) {
                                propertyId.val(state).trigger('change');
                            }
                        }
                    });
                }
            })(jQuery);
        </script>
    @endsection
</x-master-layout>