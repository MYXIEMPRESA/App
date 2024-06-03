<!-- Modal -->
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $pageTitle }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div>
                            <h5>{{ __('message.help_section_title_one') }} <span class="font-weight-bold">"{{ __('message.keyword_value')  }}" </span>{{ __('message.help_section_title_two') }}</h5>
                        </div>
                        <div class="mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="">
                                        <li class="mt-3">{{ __('message.help_section_title_three') }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ol class="ml-4">
                                        <li>{{ __('message.id') }}</li>
                                        <li>{{ __('message.language_name') }}</li>
                                        <li>{{ __('message.screen_name') }}</li>
                                        <li>{{ __('message.keyword_name') }}</li>
                                        <li>{{ __('message.keyword_value') }}</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="">
                                        <li class="mt-2">{{ __('message.help_section_title_four') }} <span class="font-weight-bold">"{{ __('message.keyword_value')  }}" </span> {{ __('message.help_section_title_five') }}</li>
                                        <li class="mt-2">{{ __('message.help_section_title_six') }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-2">
                                    <h6 class="mb-2">{{ __('message.help_section_title_seven') }} <span class="font-weight-bold">"{{ __('message.keyword_value')  }}" </span> {{ __('message.help_section_title_eight') }}
                                    </h6>
                                    <h5>{{ __('message.help_section_title_nine') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mt-2">
                                    <img src="{{ asset('images/help.png') }}" alt="help" class="mt-1" style="width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>