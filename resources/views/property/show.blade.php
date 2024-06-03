<x-master-layout :assets="$assets ?? []">
    <div class="container-fluid">
        <!-- First Section: Property Name -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle }}</h5>
                            <div class="">
                                <a href="{{ route('property.index') }}" class="float-right ml-1 btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('message.back') }}</a>
                                @if(auth()->user()->can('property-edit'))
                                    <a href="{{ route('property.edit', $id) }}" class="float-right btn btn-sm btn-primary"></i> {{ __('message.edit') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-8">
                        <!-- Property Name Section -->
                        <div class="card card-block">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title mb-0">{{ $data->name }}</h4>
                                </div>
                                <div class="d-flex flex-column align-items-center">
                                    <p class="mb-0">
                                        <span class="text-capitalize badge bg-{{ $data->status === 0 ? 'danger' : 'primary' }}">{{ $data->status == 0 ? __('message.inactive') : __('message.active') }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.category') }}</h5>
                                        <p class="mb-0">{{ optional($data->category)->name }}</p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.property_name') }}</h5>
                                        <p class="mb-0">{{ $data->name ?? '-' }}</p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.price') }}</h5>
                                        <p class="mb-0">
                                            {{ getPriceFormat($data->price) }}
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.furnished_type') }}</h5>
                                        <p class="mb-0">
                                            @switch($data->furnished_type)
                                                @case(0)
                                                    {{ __('message.unfurnished') }}
                                                @break

                                                @case(1)
                                                    {{ __('message.fully') }}
                                                @break

                                                @case(2)
                                                    {{ __('message.semi') }}
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.saller_type') }}</h5>
                                        <p class="mb-0">
                                            @switch($data->saller_type)
                                                @case(0)
                                                    {{ __('message.owner') }}
                                                @break

                                                @case(1)
                                                    {{ __('message.broker') }}
                                                @break

                                                @case(2)
                                                    {{ __('message.builder') }}
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.property_for') }}</h5>
                                        <p class="mb-0">
                                            @switch($data->property_for)
                                                @case(0)
                                                    {{ __('message.rent') }}
                                                @break

                                                @case(1)
                                                    {{ __('message.sell') }}
                                                @break

                                                @case(2)
                                                    {{ __('message.pg_co_living') }}
                                                @break
                                            @endswitch
                                        </p>
                                    </div>
                                    @if (in_array($data->property_for, [0,2]))
                                        <div class="col-4 mb-2">
                                            <h5>{{ __('message.price_duration') }}</h5>
                                            <p class="mb-0">{{ $data->price_duration ?? '-' }}</p>
                                        </div>
                                    @endif
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.age_of_property') }}</h5>
                                        <p class="mb-0">{{ $data->age_of_property ?? '-' }}</p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.maintenance') }}</h5>
                                        <p class="mb-0">
                                            {{ getPriceFormat($data->maintenance) }}
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.security_deposit') }}</h5>
                                        <p class="mb-0">
                                            {{ getPriceFormat($data->security_deposit) }}
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.brokerage') }}</h5>
                                        <p class="mb-0">
                                            {{ getPriceFormat($data->brokerage) }}
                                        </p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.bhk') }}</h5>
                                        <p class="mb-0">{{ $data->bhk == 0 ? __('message.none') : $data->bhk.' '.__('message.bhk')  }}</p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.sqft') }}</h5>
                                        <p class="mb-0">{{ $data->sqft ?? '-' }}</p>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <h5>{{ __('message.premium_property') }}</h5>
                                        <p class="mb-0">
                                            {{ $data->premium_property === 0 ? __('message.no') : ($data->premium_property === 1 ? __('message.yes') : '') }}
                                        </p>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <h5>{{ __('message.description') }}</h5>
                                        <p class="mb-0">{{ $data->description ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Amenities Section -->
                        <div class="card card-block">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title mb-0">{{ __('message.amenity') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($data->propertyamenity as $propertyamenity)
                                        @switch(optional($propertyamenity->amenity)->type)
                                            
                                            @case('textarea')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        {{ $propertyamenity->value }}
                                                    </p>
                                                </div>
                                            @break

                                            @case('dropdown')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        {{ $propertyamenity->value }}
                                                    </p>
                                                </div>
                                            @break

                                            @case('textbox')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        {{ $propertyamenity->value }}
                                                    </p>
                                                </div>
                                            @break
                                            @case('checkbox')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        @foreach( json_decode($propertyamenity->value) as $value )
                                                            {{ $value }}
                                                        @endforeach
                                                    </p>
                                                </div>
                                            @break

                                            @case('rediobutton')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        {{ $propertyamenity->value }}
                                                    </p>
                                                </div>
                                            @break

                                            @case('number')
                                                <div class="form-group col-md-6">
                                                    <h5>{{ optional($propertyamenity->amenity)->name }}</h5>
                                                    <p class="mb-0">
                                                        {{ $propertyamenity->value }}
                                                    </p>
                                                </div>
                                            @break
                                        @endswitch
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Address Section -->
                        <div class="card card-block">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title mb-0">{{ __('message.address') }}</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div style="height: 300px; width: 100%; border: 1px solid #ccc;" id="map">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-borderless border-none">
                                            <tr>
                                                <td>{{ __('message.country') }}</td>
                                                <td>{{ $data->country ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('message.state') }}</td>
                                                <td>{{ $data->state ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('message.city') }}</td>
                                                <td>{{ $data->city ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="d-flex">{{ __('message.address') }}</td>
                                                <td>{{ $data->address ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('message.latitude') }}</td>
                                                <td>{{ $data->latitude ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('message.longitude') }}</td>
                                                <td>{{ $data->longitude ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- User Details -->
                        @if ($data->user->user_type == 'user')
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">
                                        {{ __('message.property_owner_detail') }}
                                    </h4>
                                    <div class="mt-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ getSingleMedia($data->user, 'profile_image') }}" alt="01.jpg"
                                                    class="rounded d-block img-fluid mb-3 mt-4">
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="mt-3">{{ optional($data->user)->display_name ?? '' }}</h6>
                                                <h6 class="mt-3">{{ auth()->user()->hasRole('admin') ? optional($data->user)->email : maskSensitiveInfo('email',optional($data->user)->email) }}</h6>
                                                <h6 class="mt-3">{{ auth()->user()->hasRole('admin') ? optional($data->user)->contact_number : maskSensitiveInfo('contact_number',optional($data->user)->contact_number) }}</h6>
                                                <div class="mt-3">
                                                    <h6>{{ optional($data->user)->address ?? '' }}</h6>
                                                </div>
                                                <h6 class="mt-3">{{ dateAgoFormate ( optional($data->user)->created_at,true ) }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Main Property Image -->
                        @if( isset($id) && getMediaFileExit($data, 'property_image'))
                            <div class="card">
                                <div class="card-body">
                                    <div class="header-title justify-content-between ">
                                        <h4 class="mb-2 flex-wrap col-md-12 text-center">{{ __('message.cover_image') }}</h4><hr>
                                        <a href="{{ getSingleMedia($data,'property_image') }}" class="magnific-popup-image-gallery">
                                            <img src="{{ getSingleMedia($data, 'property_image') }}" alt="01.jpg" class="rounded d-block mx-auto img-fluid mb-3 vw-100">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if( isset($data) && $data->hasMedia('property_gallary') )
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="mb-2 flex-wrap col-md-12 text-center">{{ __('message.property_gallery') }}</h4><hr>
                                            </div>
                                            <div id="image-preview" class="d-flex flex-wrap col-md-12">
                                                @foreach($data->getMedia('property_gallary') as $media)
                                                    <div class="col-md-4 mb-2">
                                                        <a class="magnific-popup-image-gallery" href="{{ $media->getUrl() }}" title="{{ $media->name }}">
                                                            <img id="{{ $media->id }}_preview" src="{{ $media->getUrl() }}" alt="{{ $media->name }}" class="attachment-image mt-3">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('bottom_script')
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
                } 
            }

            function initializeMap(myLatlng) {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: myLatlng
                });

                marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map
                });
            }
            window.onload = initMap;
        </script>
    @endsection
</x-master-layout>
