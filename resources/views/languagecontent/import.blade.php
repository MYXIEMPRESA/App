<!-- Modal -->
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        {{ Form::open(['route' => 'import.languagekeyword', 'method' => 'post', 'enctype' => 'multipart/form-data', 'data-toggle' => 'validator' ]) }}
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-control-label" for="customFile">{{ __('message.file') }} </label>
                    <div class="custom-file text-left">
                        <input type="file" name="language_with_keyword" class="custom-file-input" id="customFile"  accept=".csv" required="required" />
                        <label class="custom-file-label" for="customFile">{{  __('message.choose_file',['file' =>  __('message.csv') ]) }}</label>
                    </div>
                    <span class="selected_file"></span>
                </div>
            </div>
            <div class="modal-footer">
                {{ Form::submit( __('message.import'), [ 'class' => 'btn btn-md btn-primary float-right', 'id' => 'btn_submit', 'data-form' => 'ajax' ]) }}
                <button type="button" class="btn btn-md btn-secondary float-right mr-1" data-dismiss="modal">{{ __('message.close') }}</button>
            </div>
        {{ Form::close() }}
    </div>
</div>