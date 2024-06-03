
<x-app-layout :assets="$assets ?? []">
    <div>
        <?php $id = $id ?? null;?>
        @if(isset($id))
            {!! Form::model($data, [ 'route' => ['extrapropertylimit.update', $id], 'method' => 'patch' ]) !!}
        @else
            {!! Form::open(['route' => ['extrapropertylimit.store'], 'method' => 'post' ]) !!}
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $pageTitle }}</h4>
                        </div>
                        <div class="card-action">
                            <a href="{{ route('extrapropertylimit.index') }}" class="btn btn-sm btn-primary" role="button">{{ __('message.back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                {{ Form::label('limit', __('message.limit').' <span class="text-danger">*</span>',[ 'class' => 'form-control-label' ], false ) }}
                                {{ Form::number('limit', old('limit'), ['class' => 'form-control',  'min' => 0, 'placeholder' => __('message.limit'),'required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('price', __('message.price').' <span class="text-danger">*</span>',[ 'class'=>'form-control-label' ], false ) }}
                                {{ Form::number('price', old('price'), ['class' => 'form-control',  'min' => 0, 'step'=>'any', 'placeholder' => __('message.price'),'required']) }}
                            </div>
                            <div class="form-group col-md-6">
                                {{ Form::label('type',__('message.type').' <span class="text-danger">*</span>',[ 'class'=>'form-control-label' ],false) }}
                                {{ Form::select('type', [ 'add_property' => __('message.add_property'), 'view_property' => __('message.view_property'), 'advertisement_property' => __('message.advertisement_property') ], old('type'), [ 'class' =>'form-control select2js','required']) }}
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
</x-app-layout>
