<x-master-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <h5 class="font-weight-bold">{{ $pageTitle }}</h5>
                            <div class="float-right">
                                @if(auth()->user()->can('article-edit'))
                                    <a href="{{ route('article.edit' ,$id) }}" class="btn btn-sm btn-primary mr-2">{{ __('message.edit') }}</a>
                                @endif
                                <a href="{{ route('article.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-angle-double-left"></i> {{ __('message.back') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ getSingleMedia($data, 'article_image') }}" alt="01.jpg" class="rounded d-block img-fluid mb-3 w-100 h-auto" style="max-height: 300px;">
            </div>
            <div class="col-md-6">
                <div class="card card-block">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">{{ $data->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mt-2 mb-2">{{ dateAgoFormate($data->created_at,true) }}</h6>
                        <div class="d-flex">
                            {{ $selected_tags }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="card card-block">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">{{ __('message.description') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! htmlspecialchars_decode($data->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('bottom_script')

@endsection
</x-master-layout>
