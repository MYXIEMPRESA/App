<x-master-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['property.update', $id], 'method' => 'patch' , 'enctype' => 'multipart/form-data']) !!}
        @else
            {!! Form::open(['route' => ['property.store'], 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('property.index') }} " class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    {{ Form::label('category_id', __('message.category').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                    {{ Form::select('category_id', isset($id) ? [ optional($data->category)->id => optional($data->category)->name ] : [], old('category_id'), [
                                            'class' => 'select2js form-group category',
                                            'data-placeholder' => __('message.select_name',[ 'select' => __('message.category') ]),
                                            'data-ajax--url' => route('ajax-list', ['type' => 'category']),
                                            'required'
                                        ])
                                    }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('name', __('message.property_name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('name', old('name'),[ 'placeholder' => __('message.property_name'),'class' =>'form-control','required']) }}
                                </div>
                                
                                <div class="form-group col-md-4">
                                    {{ Form::label('price',__('message.price').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::number('price', old('price'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.price'), 'class' => 'form-control','required' ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                  <label class="d-block">{{ __('message.furnished_type') }} </label>
                                    <div class="custom-control custom-radio custom-control-inline col-4">
                                        {{ Form::radio('furnished_type', '0', old('furnished_type') || true , [ 'class' => 'custom-control-input', 'id' => 'furnished_type-unfurnished']) }}
                                        {{ Form::label('furnished_type-unfurnished', __('message.unfurnished'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline col-2">
                                        {{ Form::radio('furnished_type', '1', old('furnished_type') , [ 'class' => 'custom-control-input', 'id' => 'furnished_type-fully']) }}
                                        {{ Form::label('furnished_type-fully', __('message.fully'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline col-2">
                                        {{ Form::radio('furnished_type', '2', old('furnished_type'), [ 'class' => 'custom-control-input', 'id' => 'furnished_type-semi']) }}
                                        {{ Form::label('furnished_type-semi', __('message.semi'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                  <label class="d-block">{{ __('message.saller_type') }} </label>                                         
                                    <div class="custom-control custom-radio custom-control-inline col-3">
                                        {{ Form::radio('saller_type', '0', old('saller_type') || true , [ 'class' => 'custom-control-input', 'id' => 'saller_type-owner']) }}
                                        {{ Form::label('saller_type-owner', __('message.owner'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline col-3">
                                        {{ Form::radio('saller_type', '1', old('saller_type') , [ 'class' => 'custom-control-input', 'id' => 'saller_type-broker']) }}
                                        {{ Form::label('saller_type-broker', __('message.broker'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline col-3">
                                        {{ Form::radio('saller_type', '2', old('saller_type'), [ 'class' => 'custom-control-input', 'id' => 'saller_type-builder']) }}
                                        {{ Form::label('saller_type-builder', __('message.builder'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="d-block">{{ __('message.property_for') }} </label>
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {{ Form::radio('property_for', '0', old('property_for') || true , [ 'class' => 'custom-control-input', 'id' => 'property_for-rent']) }}
                                                {{ Form::label('property_for-rent', __('message.rent'), ['class' => 'custom-control-label' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {{ Form::radio('property_for', '1', old('property_for') , [ 'class' => 'custom-control-input', 'id' => 'property_for-sell']) }}
                                                {{ Form::label('property_for-sell', __('message.sell'), ['class' => 'custom-control-label' ]) }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                {{ Form::radio('property_for', '2', old('property_for'), [ 'class' => 'custom-control-input', 'id' => 'property_for-pg_co_living']) }}
                                                {{ Form::label('property_for-pg_co_living', __('message.pg_co_living'), ['class' => 'custom-control-label' ]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4 price_duration">
                                    {{ Form::label('price_duration', __('message.price_duration'), [ 'class' => 'form-control-label' ] ) }}
                                    {{ Form::select('price_duration', [ 'daily' => __('message.daily'), 'monthly' => __('message.monthly'), 'quarterly' => __('message.quarterly'), 'yearly' => __('message.yearly') ], old('price_duration'), [ 'class' => 'form-control select2js' ]) }}
                                </div>

                                <div class="form-group col-md-4">
                                    {{ Form::label('age_of_property',__('message.age_of_property').' ('. __('message.year').') <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::number('age_of_property', old('age_of_property'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.age_of_property'), 'class' => 'form-control','required' ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('maintenance',__('message.maintenance').' ('. __('message.per_month').') <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::number('maintenance', old('maintenance'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.maintenance'), 'class' => 'form-control','required' ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('security_deposit',__('message.security_deposit').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::number('security_deposit', old('security_deposit'),[ 'min' => 0 , 'step'=>'any',  'placeholder' => __('message.security_deposit'), 'class' => 'form-control','required' ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('brokerage',__('message.brokerage').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::number('brokerage', old('brokerage'),[ 'min' => 0 , 'step'=>'any', 'placeholder' => __('message.brokerage'), 'class' => 'form-control','required' ]) }}
                                </div>
                                <div class="form-group col-md-4">
                                   {{ Form::label('bhk', __('message.bhk').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false) }}
                                   {{ Form::select('bhk',[ 0 => 'None', '1' => '1 BHK', '2' => '2 BHK','3' => '3 BHK','4' => '4 BHK', '5' => '5 BHK', '6' => '6 BHK', '7' => '7 BHK', '8' => '8 BHK', '9' => '9 BHK', '10' => '10 BHK' ], old('status'), [ 'id'=>'bhk','class' =>'form-control select2js bhk','required']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('sqft', __('message.sqft').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                    {{ Form::text('sqft', old('sqft'),[ 'placeholder' => __('message.sqft'),'class' =>'form-control','required']) }}
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('status',__('message.status').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                                    {{ Form::select('status',[ '1' => __('message.active'), '0' => __('message.inactive') ], old('status'), [ 'class' =>'form-control select2js','required']) }}
                                </div>
                                <div class="form-group col-md-4">
                                  <label class="d-block">{{ __('message.premium_property') }} </label>
                                    <div class="custom-control custom-radio custom-control-inline col-1">
                                        {{ Form::radio('premium_property', '1', old('premium_property') , [ 'class' => 'custom-control-input', 'id' => 'premium-property-yes']) }}
                                        {{ Form::label('premium-property-yes', __('message.yes'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline col-2">
                                        {{ Form::radio('premium_property', '0', old('premium_property') || true , [ 'class' => 'custom-control-input', 'id' => 'premium-property-no']) }}
                                        {{ Form::label('premium-property-no', __('message.no'), ['class' => 'custom-control-label' ]) }}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    {{ Form::label('description',__('message.description').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                                    {{ Form::textarea('description', null, ['class'=>"form-control textarea" , 'rows'=>3  , 'placeholder'=> __('message.description') ,'required' ]) }}
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">{{ __('message.amenity') }}</h4>
                        <hr>
                        <div class="row" id="amenity-data">
                        </div>
                        <h4 class="card-title">{{ __('message.location') }}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row" style="padding:10px"> 
                                     <div style="height: 355px;width: 600px;" id="map"></div>                              
                                </div>
                            </div>                           
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {{ Form::label('country', __('message.country').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                        {{ Form::text('country', old('country'),[ 'placeholder' => __('message.country'),'class' =>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('state', __('message.state').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                        {{ Form::text('state', old('state'),[ 'placeholder' => __('message.state'),'class' =>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{ Form::label('city', __('message.city').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                        {{ Form::text('city', old('city'),[ 'placeholder' => __('message.city'),'class' =>'form-control','required']) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('latitude', __('message.latitude').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                        {{ Form::number('latitude', old('latitude'),[ 'step' =>'any', 'placeholder' => __('message.latitude'), 'class' => 'form-control','required' ]) }}
                                    </div>
                                    <div class="form-group col-md-6">
                                        {{ Form::label('longitude', __('message.longitude').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                                        {{ Form::number('longitude', old('longitude'),[ 'step' =>'any', 'placeholder' => __('message.longitude'), 'class' => 'form-control','required' ]) }}
                                    </div>
                                    <div class="form-group col-md-12">
                                        {{ Form::label('address',__('message.address').' <span class="text-danger">*</span>', ['class' => 'form-control-label'],false) }}
                                        {{ Form::textarea('address', null, ['class'=>"form-control textarea" , 'rows'=>1  , 'placeholder'=> __('message.address'),'required' ]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">{{ __('message.image') }}</h4>
                        <hr>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="image">{{ __('message.cover_image') }}</label>
                                <div class="custom-file">
                                    <input type="file" name="property_image" class="custom-file-input" accept="image/*">
                                    <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.cover_image') ]) }}</label>
                                </div>
                                <!-- <span class="selected_file"></span> -->
                            </div>
                            <div id="property-single-image" class="d-flex flex-wrap image-row"></div>
                            @if( isset($id) && getMediaFileExit($data, 'property_image'))
                                <div class="col-md-2 mb-2">
                                    <a href="{{ getSingleMedia($data,'property_image') }}" class="magnific-popup-image-gallery">
                                        <img id="property_image_preview" src="{{ getSingleMedia($data,'property_image') }}" alt="property-image" class="attachment-image mt-1">
                                    </a>
                                    <a class="text-danger remove-file ml-1 mt-1" href="{{ route('remove.file', ['id' => $data->id, 'type' => 'property_image']) }}"
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
                            <div class="form-group col-md-4">
                                {{ Form::label('video_url', __('message.video_url'), [ 'class' => 'form-control-label' ] ) }}
                                {{ Form::url('video_url', old('title'),[ 'placeholder' => __('message.video_url'), 'class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-control-label" for="image">{{ __('message.property_gallery') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="property_gallary[]" accept="image/*" multiple>
                                    <label class="custom-file-label">{{  __('message.choose_file',['file' =>  __('message.property_gallery') ]) }}</label>
                                </div>
                            </div>
                            @if(isset($data) && $data->hasMedia('property_gallary'))
                                <div id="image-preview" class="d-flex flex-wrap col-md-12">
                                    @foreach($data->getMedia('property_gallary') as $media)
                                    <div class="col-md-2 mb-2">
                                        <a class="magnific-popup-image-gallery" href="{{ $media->getUrl() }}" title="{{ $media->name }}">
                                            <img id="{{ $media->id }}_preview" src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="attachment-image mt-3">
                                        </a>
                                        <a class="text-danger remove-file mt-3 ml-1" href="{{ route('remove.file', ['id' => $media->id, 'type' =>'property_gallary']) }}"
                                            data--submit='confirm_form'
                                            data--confirmation='true'
                                            data--ajax='true'
                                            data-toggle='tooltip'
                                            title='{{ __("message.remove_file_title" , ["name" => __("message.image") ]) }}'
                                            data-title='{{ __("message.remove_file_title" , ["name" => __("message.image") ]) }}'
                                            data-message='{{ __("message.remove_file_msg") }}'>
                                            <i class="ri-close-circle-line"></i>
                                        </a>
                                    </div>
                                    @endforeach
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
                $(".select2tagsjs").select2({
                    width: "100%",
                    tags: true
                });
                var category_id = "{{ $data->category_id ?? ''}}"; 
                if(category_id !== '' && category_id !== undefined) {
                    getCategoryAmenity(category_id);
                }

                let property_for = "{{ $data->property_for ?? 0}}";
                propertyFor(property_for)
            });

            $(document).on('change','input[name=property_for]',function() {
                propertyFor($(this).val());
            });

            function propertyFor(property_for) {

                if( property_for == 1 ) {
                    $('.price_duration').hide();
                } else {
                    $('.price_duration').show();
                }
            }

            $(document).on('change','#category_id',function()
            {
                // var data = $(this).select2('data')[0];
                // var category_id  = (data.id);
                var category_id  = $(this).val();

                getCategoryAmenity(category_id);
            });
            // PropertyAmenity
            function getCategoryAmenity(category_id = null)
            {
                var property_id = '{{ $id }}';
                url = "{{ route('get.category.amenity') }}";
                $.ajax({
                    url: url,
                    data: { 
                        id: property_id,
                        category_id:category_id
                    },
                    dataType: "json",
                    success: function(res){
                        $('#amenity-data').html(res.data);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        })(jQuery);
    </script>
    <script>
        var map;
        var marker;
        var geocoder;

        function initMap() {
            geocoder = new google.maps.Geocoder();

            if ('{{ $id }}' !== '' && '{{ $id }}' !== undefined) {
                    var get_latitude_data = {{ $data->latitude ?? 0 }};
                    var get_longitude_data = {{ $data->longitude ?? 0 }};
                    var myLatlng = {lat : get_latitude_data, lng: get_longitude_data};
                    initializeMap(myLatlng);
                } else {
                    // Use Geolocation to set user's current location
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var myLatlng = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };
                            initializeMap(myLatlng);
                        }, function(error) {
                            // Use default coordinates if error or denied permission
                            var myLatlng = {lat: 22.316258503105992, lng: 70.83204484790207};
                            initializeMap(myLatlng);
                        });
                    } else {
                        // If browser doesn't support Geolocation, use default coordinates
                        var myLatlng = {lat: 22.316258503105992, lng: 70.83204484790207};
                        initializeMap(myLatlng);
                    }
                }
            }

            function initializeMap(myLatlng) {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: myLatlng
                });

                marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    draggable: true 
                });

                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                });

                google.maps.event.addListener(marker, 'dragend', function () {
                    updateMarkerPosition(marker.getPosition());
                });
            }

            function placeMarker(location) {
                if (marker) {
                    marker.setPosition(location);
                } else {
                    marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        draggable: true
                    });
                }
                updateMarkerPosition(location);
            }

            function updateMarkerPosition(location) {
                document.getElementById('latitude').value = location.lat();
                document.getElementById('longitude').value = location.lng();
                geocoder.geocode({ 'location': location }, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            var fullAddress = results[0].formatted_address;
                            var city, state, country;

                            for (var i = 0; i < results[0].address_components.length; i++) {
                                var component = results[0].address_components[i];
                                if (component.types.includes("administrative_area_level_3")) {
                                    city = component.long_name;
                                }
                                if (component.types.includes("administrative_area_level_1")) {
                                    state = component.long_name;
                                }
                                if (component.types.includes("country")) {
                                    country = component.long_name;
                                }
                            }
                                document.getElementById('address').value = fullAddress || null;
                                document.getElementById('city').value = city || null;
                                document.getElementById('state').value = state || null;
                                document.getElementById('country').value = country || null;

                        } else {
                            alert("{{ __('message.no_result_found') }}");
                        }
                    } else {
                        alert("{{ __('message.geocoder_failed') }} " + status);
                    }
                });
            }
        window.onload = initMap;
    </script>
@endsection
</x-master-layout>
