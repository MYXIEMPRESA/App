<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['languagecontent.destroy', $id], 'method' => 'delete','data--submit'=>'languagecontent'.$id]) }}
    <div class="d-flex justify-content-end align-items-center">
        <a class="mr-2 loadRemoteModel" href="{{ route('languagecontent.edit', $id) }}" title="{{ __('message.update_form_title',['form' => __('message.languagecontent') ]) }}"><i class="fas fa-edit text-primary"></i></a>
    </div>
{{ Form::close() }}