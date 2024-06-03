
            @if(count($data) > 0 )
                @foreach ($data as $propertyamenity)
                    @switch($propertyamenity->type)
                        @case('textarea')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity->id,$propertyamenity->name.' <span class="text-danger">*</span>' ,['class' => 'form-control-label font-weight-bold font-weight-bold'],false) }}
                                {{ Form::textarea('amenity_'.$propertyamenity['id'],old($propertyamenity['id'], $propertyamenity['property_amenity']), ['class'=>"form-control" , 'rows'=>1  , 'placeholder'=> $propertyamenity->name,'required']) }}
                            </div>
                        @break

                        @case('dropdown')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label font-weight-bold' ], false) }}
                                {{ Form::select('amenity_'.$propertyamenity['id'], $propertyamenity['amenity_value']  ?? [], old($propertyamenity['id'], $propertyamenity['property_amenity']), [
                                    'class' => 'select2js form-group amenity',
                                    'data-placeholder' => __('message.select_name',[ 'select' => __('message.amenity') ]),
                                    'required',
                                    ])
                                }}
                            </div>
                        @break

                        @case('multiselect')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label font-weight-bold' ], false) }}
                                {{ Form::select('amenity_'.$propertyamenity['id'].'[]', $propertyamenity['amenity_value']  ?? [], old($propertyamenity['id'], $propertyamenity['property_amenity']), [
                                    'class' => 'select2js form-group amenity',
                                    'multiple' => true,
                                    'data-placeholder' => __('message.select_name',[ 'select' => $propertyamenity['name'] ]),
                                    'required',
                                    ])
                                }}
                            </div>
                        @break

                        @case('checkbox')
                            <div class="form-group col-md-4">
                                <div class="row">
                                    {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label font-weight-bold col-12' ], false) }}
                                    @if ( count($propertyamenity['amenity_value']) > 0 )
                                        @foreach($propertyamenity['amenity_value'] as $key => $amenity)
                                            <div class="col-lg-6">
                                                <div class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" class="custom-control-input" id="{{ $key }}" name="amenity_{{ $propertyamenity['id'] }}[]" value="{{ $amenity }}" {{ in_array($amenity, $propertyamenity['property_amenity']) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="{{ $key }}">{{ $amenity }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @break

                        @case('rediobutton')
                            <div class="form-group col-md-4">
                                <div class="row">
                                    {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label font-weight-bold col-12' ], false) }}
                                    @if ( count($propertyamenity['amenity_value']) > 0 )
                                        @foreach($propertyamenity['amenity_value'] as $key => $amenity)
                                            <div class="col-lg-6">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input class="custom-control-input" id="{{ $key }}" name="amenity_{{ $propertyamenity['id'] }}" type="radio" value="{{ $amenity }}" {{ $propertyamenity['property_amenity'] == $amenity ? 'checked' : '' }} >
                                                    {{ Form::label($key, $amenity, ['class' => 'custom-control-label' ]) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @break
                        
                        @case('number')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity->id, $propertyamenity->name.' <span class="text-danger">*</span>',['class' => 'form-control-label font-weight-bold'], false ) }}
                                {{ Form::number('amenity_'.$propertyamenity['id'] , old($propertyamenity['id'], $propertyamenity['property_amenity']),[ 'min' => 0 , 'step'=>'any', 'placeholder' => $propertyamenity->name, 'class' => 'form-control','required' ]) }}
                            </div>
                        @break

                        @default
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity->id, $propertyamenity->name.' <span class="text-danger">*</span>',['class' => 'form-control-label font-weight-bold'], false ) }}
                                {{ Form::text('amenity_'.$propertyamenity['id'] , old($propertyamenity['id'], $propertyamenity['property_amenity']),[ 'placeholder' => $propertyamenity->name, 'class' => 'form-control', 'required' ]) }}
                            </div>
                        @break
                    @endswitch
            @endforeach
            @else
                <div class="form-group col-md-4">
                    {{ __('message.not_found_entry', [ 'name' => __('message.amenity') ]) }}
                </div>
            
        @endif
<script>
$('.select2js').select2();
</script>