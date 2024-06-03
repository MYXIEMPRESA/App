<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['amenity.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['amenity.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('amenity.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    {{ Form::label('name', __('message.amenity_name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('name', old('name'),[ 'placeholder' => __('message.amenity_name'),'class' =>'form-control','required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',[ '1' => __('message.active'), '0' => __('message.inactive') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    {{ Form::label('type',__('message.type'), [ 'class'=>'form-control-label' ]) }}
                                    {{ Form::select('type',[ 'textbox' => __('message.textbox'), 'number' => __('message.number'), 'textarea' => __('message.textarea'), 'dropdown' => __('message.dropdown'),'rediobutton' => __('message.rediobutton'),'checkbox' => __('message.checkbox') ], old('status'), [ 'id'=>'type','class' =>'form-control select2js type','required']) }}
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label" for="image">{{ __('message.image') }} </label>
                                    <div class="custom-file">
                                        <input type="file" name="amenity_image" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.image') ]) }}</label>
                                    </div>
                                    <span class="selected_file"></span>
                                </div>

                                @if( isset($id) && getMediaFileExit($data, 'amenity_image'))
                                    <div class="col-md-2 mb-2">
                                        <img id="amenity_image_preview" src="{{ getSingleMedia($data,'amenity_image') }}" alt="amenity-image" class="attachment-image mt-1">
                                        <a class="text-danger remove-file" href="{{ route('remove.file', ['id' => $data->id, 'type' => 'amenity_image']) }}"
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
                                <div class="form-group col-md-12 values">
                                    {{ Form::label('title', __('message.value').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::select('value[]', $value ?? [], old('value'),[
                                            'class' => 'select2tagsjs form-group value',
                                            'id'    => 'value',
                                            'multiple' => true,
                                            'data-placeholder' => __('message.enter'),
                                        ])
                                    }}
                                   
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
            const mySelect = document.getElementById('value');

            (function ($) {
                $(document).ready(function () {

                    var type = $('select[name=type]').val();
                    changevalue(type);

                    $(".type").change(function () {
                        changevalue(this.value)
                    });

                    $(".select2tagsjs").select2({
                        width: "100%",
                        tags: true,
                    });
                });             
                function changevalue(type) {
                    switch (type) {
                        case 'dropdown':
                            $('.values').show();
                            mySelect.setAttribute('required', 'true');
                            break;
                        case 'rediobutton':
                            $('.values').show();
                            mySelect.setAttribute('required', 'true');
                            break;
                        case 'checkbox':
                            $('.values').show();
                            mySelect.setAttribute('required', 'true');
                            break;
                        default:
                            $('.values').hide();
                            mySelect.removeAttribute('required');
                            break;
                    }
                }
            })(jQuery);

        </script>
    @endsection
</x-master-layout>
