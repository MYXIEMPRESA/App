{{ Form::model($setting_value, ['method' => 'POST','route' => ['settingUpdate'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}
    {{ Form::hidden('id', null, ['class' => 'form-control'] ) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control'] ) }}
    <div class="row">
        @foreach($setting as $key => $value)
            <div class="col-md-12 col-sm-12 card shadow mb-10">
                <div class="card-header">
                    <h4>{{ $key == 'NEARBY' ? strtoupper( __('message.near_by_places')) : $key }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($value as $sub_keys => $sub_value)
                            @php
                                $data=null;
                                foreach($setting_value as $v){

                                    if($v->key==($key.'_'.$sub_keys)){
                                        $data = $v;
                                    }
                                }
                                $class = 'col-md-6';
                                $type = 'text';
                                switch ($key){
                                    case 'FIREBASE':
                                        $class = 'col-md-12';
                                        break;
                                    case 'COLOR' : 
                                        $type = 'color';
                                        break;
                                    case 'DISTANCE' :
                                        $type = 'number';
                                        break;
                                    case 'NEARBY' :
                                        $type = 'number';
                                        break;
                                    default : break;
                                }
                            @endphp
                            <div class=" {{ $class }} col-sm-12">
                                <div class="form-group">
                                    <label for="{{ $key.'_'.$sub_keys }}">{{ $key == 'NEARBY' && $sub_keys == 'PLACE' ? strtoupper(__('message.show_near_by_places')) : str_replace('_',' ',$sub_keys) }} </label>
                                    {{ Form::hidden('type[]', $key , ['class' => 'form-control'] ) }}
                                    <input type="hidden" name="key[]" value="{{ $key.'_'.$sub_keys }}">
                                    @if($key == 'CURRENCY' && $sub_keys == 'CODE')
                                        @php
                                            $currency_code = $data->value ?? 'USD';
                                            $currency = currencyArray($currency_code);
                                        @endphp
                                        <select class="form-control select2js" name="value[]" id="{{ $key.'_'.$sub_keys }}">
                                            @foreach(currencyArray() as $array)
                                                <option value="{{ $array['code'] }}" {{ $array['code'] == $currency_code  ? 'selected' : '' }}> ( {{$array['symbol']  }}  ) {{ $array['name'] }}</option>
                                            @endforeach
                                        </select>
                                    @elseif($key == 'CURRENCY' && $sub_keys == 'POSITION')
                                        {{ Form::select('value[]',['left' => __('message.left') , 'right' => __('message.right') ], isset($data) ? $data->value : 'left',[ 'class' =>'form-control select2js']) }}
                                    @elseif($key == 'DISTANCE' && $sub_keys == 'UNIT')
                                        {{ Form::select('value[]',['km' => __('message.km'), 'mile' => __('message.mile') ], isset($data) ? $data->value : 'km', [ 'class' =>'form-control select2js'] ) }}
                                    @elseif($key == 'NEARBY' && $sub_keys == 'PLACE')
                                        {{ Form::select('value[]',['1' => __('message.yes'), '0' => __('message.no') ], isset($data) ? $data->value : '1', [ 'class' =>'form-control select2js'] ) }}
                                    @else
                                        <input type="{{ $type }}" name="value[]" value="{{ isset($data) ? $data->value : null }}" id="{{ $key.'_'.$sub_keys }}" {{ $type == 'number' ? "min=0 step='any'" : '' }} class="form-control form-control-lg" placeholder="{{ str_replace('_',' ',$sub_keys) }}">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            {!! Form::submit( __('message.save'), [ 'class' => 'btn btn-md btn-primary' ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        @endForeach
    </div>
{{ Form::submit(__('message.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}

<script>
    $(document).ready(function() {
        $('.select2js').select2();
    });
</script>
