<x-master-layout>
<div class="container-fluid">
    <div class="row">            
        <div class="col-lg-12">
            <div class="card card-block card-stretch">
                <div class="card-body p-0">
                    <div class="d-flex justify-content-between align-items-center p-3">
                        <h5 class="font-weight-bold">{{ $pageTitle }}</h5>
                        <a href="{{ route('users.index') }}" class="float-right btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('message.back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
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
        </div>
    </div> 
</div>
</x-master-layout>