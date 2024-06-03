<?php
    $auth_user= authSession();
?>
{{-- {{ Form::open(['route' => ['languagekeyword.destroy', $id], 'method' => 'delete','data--submit'=>'languagekeyword'.$id]) }} --}}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('languagekeyword-edit'))
            <a class="mr-2 loadRemoteModel" href="{{ route('languagekeyword.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.languagekeyword') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif

        
            {{-- <a class="mr-2 text-danger loadRemoteModel" href="javascript:void(0)" data--submit="languagekeyword{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.languagekeyword') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.languagekeyword') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a> --}}
    </div>
{{-- {{ Form::close() }} --}}