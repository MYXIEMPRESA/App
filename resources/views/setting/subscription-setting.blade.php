{{ Form::open(['method' => 'POST','route' => ['subscriptionSettingsUpdate'], 'data-toggle' => 'validator' ]) }}
    {{ Form::hidden('id', null, ['class' => 'form-control'] ) }}
    {{ Form::hidden('page', $page, ['class' => 'form-control'] ) }}
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('subscription_system', __('message.subscription_system').' <span class="text-danger">*</span>',['class'=>'form-control-label'],false) }}
                {{ Form::select('subscription_system',[ '0' => __('message.no'), '1' => __('message.yes') ], $settings || old('subscription_system'),[ 'class' => 'form-control select2js', 'required']) }}
            </div>
        </div>
    </div>
    {{ Form::submit(__('message.save'), [ 'class' => 'btn btn-md btn-primary float-md-right' ]) }}
{{ Form::close() }}
<script>
    $(document).ready(function() {
        $('.select2js').select2();
    });
</script>