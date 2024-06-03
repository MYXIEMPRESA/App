<x-master-layout>
<div class="container-fluid">
    <div class="row">            
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h5 class="font-weight-bold">{{ $pageTitle }}</h5>
                        <a href="{{ route('customer.index') }}" class="float-right btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('message.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="{{ route('customer.show', $data->id) }}" class="nav-link {{ $type == 'detail' ? 'active': '' }}"> {{ __('message.detail') }} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.show', [ 'id' => $data->id, 'type' => 'property']) }}" class="nav-link {{ $type == 'property' ? 'active': '' }}"> {{ __('message.property') }} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.show', [ 'id' => $data->id, 'type' => 'subscription']) }}" class="nav-link {{ $type == 'subscription' ? 'active': '' }}"> {{ __('message.subscription') }} </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('customer.show', [ 'id' => $data->id, 'type' => 'extrapropertylimit']) }}" class="nav-link {{ $type == 'extrapropertylimit' ? 'active': '' }}"> {{ __('message.extrapropertylimit') }} </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="row">
                            @if( $type == 'detail' )
                                <div class="col-lg-4">
                                    <div class="card card-block p-card">
                                        <div class="profile-box">
                                            <div class="profile-card rounded">
                                                <img src="{{ $profileImage }}" alt="01.jpg" class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
                                                <h3 class="font-600 text-white text-center mb-0">{{ $data->display_name }}</h3>
                                                <p class="text-white text-center mb-5">

                                                    @php
                                                        $status = 'warning';
                                                        switch ($data->status) {
                                                            case 'active':
                                                                $status = 'success';
                                                                break;
                                                            case 'inactive':
                                                                $status = 'danger';
                                                                break;
                                                            case 'banned':
                                                                $status = 'dark';
                                                                break;
                                                        }
                                                    @endphp

                                                    <span class="text-capitalize badge bg-{{ $status }} ">{{ $data->status }}</span>
                                                </p>
                                            </div>
                                            <div class="pro-content rounded">
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="p-icon mr-3"> 
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <p class="mb-0 eml">{{ auth()->user()->hasRole('admin') ? $data->email : maskSensitiveInfo('email',$data->email) }}</p>
                                                </div>
                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="p-icon mr-3"> 
                                                        <i class="fas fa-phone-alt"></i>
                                                    </div>
                                                    <p class="mb-0">{{ auth()->user()->hasRole('admin') ? $data->contact_number : maskSensitiveInfo('contact_number',$data->contact_number) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-8">
                                    @if( $data->subscription_system )
                                        <div class="row">
                                            <div class="card card-block">
                                                <div class="card-header d-flex justify-content-between">
                                                    <div class="header-title">
                                                        <h4 class="card-title mb-0">{{ __('message.current_purchase_plan') }}</h4>
                                                    </div>
                                                </div>
                                                
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.package') }}</h5>
                                                            <p class="mb-0">{{ $data->subscription_data['package_data']['name'] ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.payment_type') }}</h5>
                                                            <p class="mb-0">{{ $data->subscription_data['payment_type'] ?? '-' }}</p>
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.subscription_start_date') }}</h5>
                                                            <p class="mb-0">{{ isset($data->subscription_data['subscription_start_date']) ? dateAgoFormate( $data->subscription_data['subscription_start_date'],true ) : '-' }}</p>
                                                        </div>
                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.subscription_end_date') }}</h5>
                                                            <p class="mb-0">{{ isset($data->subscription_data['subscription_end_date']) ? dateAgoFormate( $data->subscription_data['subscription_end_date'],true ) : '-' }}</p>
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.total_amount') }}</h5>
                                                            <p class="mb-0">{{ isset($data->subscription_data['total_amount']) ? getPriceFormat($data->subscription_data['total_amount']) : '-' }}</p>
                                                        </div>

                                                        <div class="col-6 mb-2">
                                                            <h5>{{ __('message.status') }}</h5>
                                                            <p class="mb-0">{{ $data->subscription_data['status'] ?? '-' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card card-block">
                                                <div class="card-body">
                                                    <div class="top-block-one">                                
                                                        <p class="mb-1">{{ __('message.total_property') }}</p>
                                                        <p></p>
                                                        <h5>{{ $data->property()->count() }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                            $subscription_data = $data->subscription_data;
                                        @endphp
                                        @if( $data->subscription_system )
                                            @if( isset($subscription_data) && $subscription_data['status'] == 'active' )
                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.add_property_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                @if( $subscription_data['package_data']['add_property'] == 1 )
                                                                    {{ __('message.unlimited') }}
                                                                @else
                                                                    {{ $data->with_extra_add_property_limit - $data->add_limit_count }} / {{ $data->with_extra_add_property_limit }}
                                                                @endif
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.advertisement_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                @if( $subscription_data['package_data']['advertisement'] == 1 )
                                                                    {{ __('message.unlimited') }}
                                                                @else
                                                                    {{ $data->with_extra_advertisement_limit - $data->advertisement_limit }} / {{ $data->with_extra_advertisement_limit }}
                                                                @endif
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.view_contact_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                @if( $subscription_data['package_data']['property'] == 1 )
                                                                    {{ __('message.unlimited') }}
                                                                @else
                                                                    {{ $data->with_extra_property_limit - $data->view_limit_count }} / {{ $data->with_extra_property_limit }}
                                                                @endif
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                                <div class="col-md-4">
                                                    <div class="card card-block">
                                                        <div class="card-body">
                                                            <div class="top-block-one">
                                                                <div class="">
                                                                    <p class="mb-1">{{ __('message.view_contact_limit') }}</p>
                                                                    <p></p>
                                                                    <h5>
                                                                        {{ $data->propertyViewHistory()->count() }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.add_property_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                    {{ $data->property()->count() }} / {{ __('message.unlimited') }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.advertisement_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                    {{ $data->userAdvertisementProperty()->count() }} / {{ __('message.unlimited') }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card card-block">
                                                    <div class="card-body">
                                                        <div class="top-block-one">
                                                            <div class="">
                                                                <p class="mb-1">{{ __('message.view_contact_limit') }}</p>
                                                                <p></p>
                                                                <h5>
                                                                {{ __('message.unlimited') }}
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            @if( $type == 'property' )
                                <div class="card card-block">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">{{ __('message.list_form_title', [ 'form' => __('message.property') ]) }}</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                                    </div>
                                </div>
                            @endif

                            @if( $type == 'wallethistory' )
                                <div class="card card-block">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">{{ __('message.list_form_title', [ 'form' => __('message.wallethistory') ]) }}</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                                    </div>
                                </div>
                            @endif

                            @if( $type == 'subscription' )
                                <div class="card card-block">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">{{ __('message.list_form_title', [ 'form' => __('message.subscription') ]) }}</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                                    </div>
                                </div>                 
                            @endif
                            @if( $type == 'extrapropertylimit' )
                                <div class="card card-block">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="header-title">
                                            <h4 class="card-title mb-0">{{ __('message.list_form_title', [ 'form' => __('message.extrapropertylimit') ]) }}</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                                    </div>
                                </div>                 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
@section('bottom_script')
    {{ $dataTable->scripts() }}
@endsection
</x-master-layout>