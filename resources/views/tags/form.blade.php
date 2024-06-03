<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @if(isset($id))
            {!! Form::model($data, ['route' => ['tags.update', $id], 'method' => 'patch' ]) !!}
        @else
            {!! Form::open(['route' => ['tags.store'], 'method' => 'post']) !!}
        @endif
            <div class="modal-body">
                <div class="form-group">
                    <div class="form-group col-md-12">
                        {{ Form::label('name', __('message.name').' <span class="text-danger">*</span>',['class' => 'form-control-label'], false ) }}
                        {{ Form::text('name', old('name'),[ 'placeholder' => __('message.name'),'class' =>'form-control','required']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit( __('message.save'), [ 'class' => 'btn btn-md btn-primary float-right', 'id' => 'btn_submit', 'data-form' => 'ajax' ]) }}
                <button type="button" class="btn btn-md btn-secondary float-right mr-1" data-dismiss="modal">{{ __('message.close') }}</button>
            </div>
        {{ Form::close() }}
    </div>
</div>