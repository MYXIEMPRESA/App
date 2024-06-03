
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['languagetable.destroy', $id], 'method' => 'delete','data--submit'=>'languagetable'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        @if($auth_user->can('language-edit'))
            <a class="mr-2" href="{{ route('languagetable.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.language') ]) }}"><i class="fas fa-edit text-primary"></i></a>
        @endif

        @if($auth_user->can('language-delete'))
            <a class="mr-2 text-danger" href="javascript:void(0)" data--submit="languagetable{{$id}}" 
                data--confirmation='true' data-title="{{ __('message.delete_form_title',['form'=> __('message.language') ]) }}"
                title="{{ __('message.delete_form_title',['form'=>  __('message.language') ]) }}"
                data-message='{{ __("message.delete_msg") }}'>
                <i class="fas fa-trash-alt"></i>
            </a>
        @endif
    </div>
{{ Form::close() }}