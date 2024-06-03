
@if(count($data) > 0 )
                @foreach ($data as $propertyamenity)
                    @if ($propertyamenity->type == 'textarea')
                        <div class="form-group col-md-4">
                            {{ Form::label($propertyamenity->id,$propertyamenity->name.' <span class="text-danger">*</span>' ,['class' => 'form-control-label'],false) }}
                            {{ Form::textarea('amenity_'.$propertyamenity['id'],old($propertyamenity['id'], $propertyamenity['property_amenity']), ['class'=>"form-control" , 'rows'=>1  , 'placeholder'=> $propertyamenity->name,'required']) }}
                        </div>
                    @elseif ($propertyamenity->type == 'dropdown' )
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                {{ Form::select('amenity_'.$propertyamenity['id'], $propertyamenity['amenity_value']  ?? [], old($propertyamenity['id'], $propertyamenity['property_amenity']), [
                                    'class' => 'select2js form-group amenity',
                                    'data-placeholder' => __('message.select_name',[ 'select' => __('message.amenity') ]),
                                    'required',
                                ])
                                }}
                            </div>
                    @elseif ($propertyamenity->type == 'rediobutton')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                {{ Form::select('amenity_'.$propertyamenity['id'], $propertyamenity['amenity_value']  ?? [], old($propertyamenity['id'], $propertyamenity['property_amenity']), [
                                    'class' => 'select2js form-group amenity',
                                    'data-placeholder' => __('message.select_name',[ 'select' => __('message.amenity') ]),
                                    'required',
                                ])
                                }}
                            </div>
                    @elseif ($propertyamenity->type == 'checkbox')
                            <div class="form-group col-md-4">
                                {{ Form::label($propertyamenity['id'], $propertyamenity['name'].' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                {{ Form::select('amenity_'.$propertyamenity['id'].'[]', $propertyamenity['amenity_value']  ?? [], old($propertyamenity['id'], $propertyamenity['property_amenity']), [
                                    'class' => 'select2js form-group amenity',
                                    'multiple' => true,
                                    'data-placeholder' => __('message.select_name',[ 'select' => $propertyamenity['name'] ]),
                                    'required',
                                ])
                                }}
                            </div>
                    @else
                        <div class="form-group col-md-4">
                            {{ Form::label($propertyamenity->id, $propertyamenity->name.' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                            {{ Form::number('amenity_'.$propertyamenity['id'] , old($propertyamenity['id'], $propertyamenity['property_amenity']),[ 'min' => 0 , 'step'=>'any', 'placeholder' => $propertyamenity->name, 'class' => 'form-control','required' ]) }}
                        </div>
                @endif
                @endforeach
            @else
                <div class="form-group col-md-4">
                    {{ __('message.not_found_entry', [ 'name' => __('message.amenity') ]) }}
                </div>
            
        @endif
<script>
$('.select2js').select2();
</script>