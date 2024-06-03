
<x-app-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, [ 'route' => ['package.update', $id], 'method' => 'patch', 'enctype' => 'multipart/form-data' ]) !!}
        @else
            {!! Form::open(['route' => ['package.store'], 'method' => 'post', 'enctype' => 'multipart/form-data' ]) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('package.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{ Form::label('name', __('message.name').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                {{ Form::text('name', old('name'),[ 'placeholder' => __('message.name'),'class' =>'form-control','required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('price', __('message.price').' <span class="text-danger">*</span>',['class'=>'form-control-label'], false ) }}
                                {{ Form::number('price', old('price'), ['class' => 'form-control',  'min' => 0, 'step'=>'any', 'placeholder' => __('message.price'),'required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('duration_unit',__('message.duration_unit'), ['class' => 'form-control-label']) }}
                                {{ Form::select('duration_unit',[ 'monthly' => __('message.monthly'), 'yearly' => __('message.yearly') ], old('duration_unit'),[ 'class' =>'form-control select2js','required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('duration',trans('message.duration').' <span class="text-danger">*</span>', ['class'=>'form-control-label'],false) }}
                                {{ Form::select('duration',['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12' ],old('duration'),[ 'id' => 'duration' ,'class' =>'form-control select2js','required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                {{ Form::select('status',[ '1' => __('message.active'), '0' => __('message.inactive') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
                            </div>
                            <div class="form-group col-md-3">
                                <label class="d-block">{{ __('message.add_property_limit') }} <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('add_property', '0', old('add_property') , [ 'class' => 'custom-control-input', 'id' => 'add-property-limit']) }}
                                    {{ Form::label('add-property-limit', __('message.limit'), ['class' => 'custom-control-label' ]) }}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('add_property', '1', old('add_property') , [ 'class' => 'custom-control-input', 'id' => 'add-property-unlimited']) }}
                                    {{ Form::label('add-property-unlimited', __('message.unlimited'), ['class' => 'custom-control-label' ]) }}
                                </div>
                            </div>
                            @if(isset($id))
                                @if($data->add_property == 0)
                                    <div class="form-group add_property_limit col-md-3">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('add_property_limit' , old('add_property_limit'),['min'=> 0, 'placeholder' => __('message.add_property_limit'),'class' =>'form-control col-sm-6 add-property-limit']) }}
                                    </div>
                                @else
                                    <div class="form-group add_property_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('add_property_limit' , old('add_property_limit'),[ 'min'=> 0, 'placeholder' => __('message.add_property_limit'),'class' =>'form-control col-sm-6 add-property-limit']) }}
                                    </div>
                                @endif
                                @else
                                    <div class="form-group add_property_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('add_property_limit' , old('add_property_limit'),['min'=> 0, 'placeholder' => __('message.add_property_limit'),'class' =>'form-control col-sm-6 add-property-limit']) }}
                                    </div>
                            @endif
                        </div>   
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label class="d-block">{{ __('message.property_limit') }} <span class="text-danger">*</span> </label>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('property', '0', old('property') , [ 'class' => 'custom-control-input', 'id' => 'property-limit']) }}
                                    {{ Form::label('property-limit', __('message.limit'), ['class' => 'custom-control-label' ]) }}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('property', '1', old('property') , [ 'class' => 'custom-control-input', 'id' => 'property-unlimited']) }}
                                    {{ Form::label('property-unlimited', __('message.unlimited'), ['class' => 'custom-control-label' ]) }}
                                </div>
                            </div>
                            @if(isset($id))
                                @if($data->property == 0)
                                    <div class="form-group property_limit col-md-3">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('property_limit' , old('property_limit'),['min'=> 0, 'placeholder' => __('message.property_limit'),'class' =>'form-control col-sm-6 property-limit']) }}
                                    </div>
                                @else
                                    <div class="form-group property_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('property_limit' , old('property_limit'),[ 'min'=> 0, 'placeholder' => __('message.property_limit'),'class' =>'form-control col-sm-6 property-limit']) }}
                                    </div>
                                @endif
                                @else
                                    <div class="form-group property_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('property_limit' , old('property_limit'),['min'=> 0, 'placeholder' => __('message.property_limit'),'class' =>'form-control col-sm-6 property-limit']) }}
                                    </div>
                            @endif
                            <div class="form-group col-md-3">
                                <label class="d-block">{{ __('message.advertisement_limit') }} <span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('advertisement', '0', old('advertisement') , [ 'class' => 'custom-control-input', 'id' => 'advertisement-limit']) }}
                                    {{ Form::label('advertisement-limit', __('message.limit'), ['class' => 'custom-control-label' ]) }}
                                </div>
                                <div class="custom-control custom-radio custom-control-inline col-2">
                                    {{ Form::radio('advertisement', '1', old('advertisement') , [ 'class' => 'custom-control-input', 'id' => 'advertisement-unlimited']) }}
                                    {{ Form::label('advertisement-unlimited', __('message.unlimited'), ['class' => 'custom-control-label' ]) }}
                                </div>
                            </div>   
                            @if(isset($id))
                                @if($data->advertisement == 0)
                                    <div class="form-group advertisement_limit col-md-3">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('advertisement_limit', old('advertisement_limit'),['min'=> 0, 'placeholder' => __('message.advertisement_limit'),'class' =>'form-control col-sm-6 advertisement-limit']) }}
                                    </div>
                                    @else
                                    <div class="form-group advertisement_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('advertisement_limit', old('advertisement_limit'),['min'=> 0, 'placeholder' => __('message.advertisement_limit'),'class' =>'form-control col-sm-6 advertisement-limit']) }}
                                    </div>
                                @endif
                                @else
                                    <div class="form-group advertisement_limit col-md-3" style="display: none">
                                        {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                        {{ Form::number('advertisement_limit', old('advertisement_limit'),['min'=> 0, 'placeholder' => __('message.advertisement_limit'),'class' =>'form-control col-sm-6 advertisement-limit']) }}
                                    </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                {{ Form::label('description',__('message.description').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                                {{ Form::textarea('description', null, ['class'=> 'form-control tinymce-description' , 'placeholder'=> __('message.description') ]) }}
                            </div>                                                   
                        </div>
                        <hr>
                        {{ Form::submit( __('message.save'), ['class'=>'btn btn-md btn-primary float-right']) }}
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
                changeValues();
                $('input[name="add_property"], input[name="property"], input[name="advertisement"]').change(function () {
                    changeValues();
                });
                function changeValues() {
                    add_property_value = $('input[name="add_property"]:checked').val();
                    property_value = $('input[name="property"]:checked').val();
                    add_advertisement_value = $('input[name="advertisement"]:checked').val();

                    switch (add_property_value) {
                        case '0':
                            $('.add_property_limit').show();
                            $('.add-property-limit').prop('required', true);
                            break;
                        case '1':
                            $('.add_property_limit').hide();
                            $('.add-property-limit').prop('required', false);
                            break;
                        default:
                            $('.add_property_limit').hide();
                            $('.add-property-limit').prop('required', false);
                        break;
                    }

                    switch (property_value) {
                        case '0':
                            $('.property_limit').show();
                            $('.property-limit').prop('required', true);
                            break;
                        case '1':
                            $('.property_limit').hide();
                            $('.property-limit').prop('required', false);
                            break;
                        default:
                            $('.property_limit').hide();
                            $('.property-limit').prop('required', false);
                        break;
                    }

                    switch (add_advertisement_value) {
                        case '0':
                            $('.advertisement_limit').show();
                            $('.advertisement-limit').prop('required', true);
                            break;
                        case '1':
                            $('.advertisement_limit').hide();
                            $('.advertisement-limit').prop('required', false);
                            break;
                        default:
                            $('.advertisement_limit').hide();
                            $('.advertisement-limit').prop('required', false);
                        break;
                    }

                }      
            })(jQuery);
        </script>
    @endsection
</x-app-layout>
