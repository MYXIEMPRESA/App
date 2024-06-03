<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        {{ Form::open(['method' => 'get', 'route' => 'property.index','id' => 'filter-property-form' ]) }}
            <div class="modal-body">
                <div class="row p-2" id="clear-filter-list-data">
                    <div class="form-group col-md-4">
                        {{ Form::label('category', __('message.select_name',[ 'select' => __('message.category') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('category', isset($category) ? [ $category->id  => $category->name ] : [], old('category'), [
                            'class' => 'select2Clear form-group category',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.category') ]),
                            'data-ajax--url' => route('ajax-list', [ 'type' => 'category' ]),
                        ]) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('city', __('message.select_name',[ 'select' => __('message.city') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('city', isset($city) ? [ $city  => $city ] : [], old('city'), [
                            'class' => 'select2Clear form-group property_city',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.city') ]),
                            'data-ajax--url' => route('ajax-list', [ 'type' => 'property-city' ]),
                        ]) }}
                    </div>
                    <div class="form-group col-md-4">
                        {{ Form::label('bhk', __('message.select_name',[ 'select' => __('message.bhk') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('bhk', [ $bhk => $bhk == 0 ? __('message.none') : $bhk.' '.__('message.bhk') ], $bhk ?? old($bhk), [
                            'class' => 'select2Clear form-group bhk',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.bhk') ]),
                            'data-ajax--url' => route('ajax-list', [ 'type' => 'bhk' ]),
                        ]) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('furnished_type', __('message.select_name',[ 'select' => __('message.furnished_type') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('furnished_type', [ ''=>'', 0 => __('message.unfurnished'), '1' => __('message.fully'), '2' => __('message.semi')], $furnished_type ?? old($furnished_type), [
                            'class' => 'select2Clear form-group furnished_type',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.furnished_type') ]),
                        ]) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('property_for', __('message.select_name',[ 'select' => __('message.property_for') ]), [ 'class' => 'form-control-label' ]) }}
                        {{ Form::select('property_for', [''=>'', 0 => __('message.rent'), '1' => __('message.sell'), '2' => __('message.pg_co_living')], $property_for ?? old($property_for), [
                            'class' => 'select2Clear form-group property_for',
                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.property_for') ]),
                        ]) }}
                    </div>
                </div>
                <div class="row p-2" id="clear-filter-list-number">
                    <div class="form-group col-md-3">
                        {{ Form::label('start_price',__('message.start_price').'',['class'=>'form-control-label'],false) }}
                        {{ Form::number('start_price', $start_price ?? old('start_price'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.start_price'), 'class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('end_price',__('message.end_price').'',['class'=>'form-control-label'],false) }}
                        {{ Form::number('end_price', $end_price ?? old('end_price'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.end_price'), 'class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('start_brokerage',__('message.start_brokerage').'',['class'=>'form-control-label'],false) }}
                        {{ Form::number('start_brokerage', $start_brokerage ?? old('start_brokerage'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.start_brokerage'), 'class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group col-md-3">
                        {{ Form::label('end_brokerage',__('message.end_brokerage'). '',['class'=>'form-control-label'],false) }}
                        {{ Form::number('end_brokerage', $end_brokerage ?? old('end_brokerage'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.end_brokerage'), 'class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('start_age_of_property',__('message.start_age_of_property').'',['class'=>'form-control-label'],false) }}
                        {{ Form::number('start_age_of_property', $start_age_of_property ?? old('start_age_of_property'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.start_age_of_property'), 'class' => 'form-control' ]) }}
                    </div>
                    <div class="form-group col-md-6">
                        {{ Form::label('end_age_of_property',__('message.end_age_of_property'). '',['class'=>'form-control-label'],false) }}
                        {{ Form::number('end_age_of_property', $end_age_of_property ?? old('end_age_of_property'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.end_age_of_property'), 'class' => 'form-control' ]) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-danger float-right mr-1 clearListPropertynumber">{{ __('message.reset') }}</button>
                {{ Form::submit( __('message.apply_filter'), [ 'id' => 'apply-property-filter', 'class' => 'btn btn-md btn-primary float-right' ]) }}
            </div>
        {{ Form::close() }}
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.clearListPropertynumber').click(function() {
            $('#clear-filter-list-number').find('input').val('');
            $('#clear-filter-list-data').find('select.select2Clear').val(null).trigger('change');
        });

        $('#apply-property-filter').click(function() {
            $('#filter-property-form').submit(function() {
                $(this).find(':input').filter(function() {
                    return $.trim(this.value) === '';
                }).prop('disabled', true);

                return true;
            });
        });

    });
</script>
