<x-master-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header1 d-flex justify-content-between mt-3 ml-3">
                        <div class="header-title">
                            <h4 class="card-title"><b>{{ $pageTitle }}</b>
                            <span class="" data-bs-toggle="tooltip" title="{{ __('message.help_info') }}">
                                <i class="fas fa-info-circle fa-sm"></i>
                            </span>
                        </h4>
                                   
                        </div>
                        <div class="card-action mr-2 mb-2">
                            <a href="{{ route('help') }}" class="btn btn-sm loadRemoteModel mr-3 help" role="button">{{ __('message.help') }}</a>
                            <a href="{{ route('download.template') }}" class="btn btn-sm mr-3 downloadtemplate loadRemoteModel" role="button"><i class="fas fa-file-download mr-2 "></i> {{ __('message.download_template') }}</a>
                            
                        </div>                        
                    </div>
                    <div style="text-align: end">
                        <h5 class="mt-2 mr-3"><span class="font-weight-bold">{{ __('message.note') }}</span>
                        {{ __('message.bulk_note') }}
                            </h5>
                    </div>
                {{ Form::open(['route' => 'import.languagekeyword', 'method' => 'post', 'enctype' => 'multipart/form-data', 'data-toggle' => 'validator' ]) }}
                    <div class="card-body">
                        <div class="new-user-info">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="file" name="language_with_keyword" class="custom-file-input" id="customFile" accept=".csv" required="required">
                                </div>
                            </div>
                            {{ Form::submit( __('message.import'), ['class'=>'btn btn-md btn-primary float-right mt-2 mb-2']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
    @section('bottom_script')
    <script>
        var globalFunctions = {};

        globalFunctions.ddInput = function(elem) {
        if ($(elem).length == 0 || typeof FileReader === "undefined") return;
        var $fileupload = $('input[type="file"]');
        var noitems = '<li class="no-items">{{ __('message.drop_your_template_here') }}<br><button class="blue-text">{{ __('message.browse_file') }}</button></li>';
        var hasitems = '<div class="browse hasitems">{{ __('message.other_file_to_upload') }} <span class="blue-text">Browse</span> {{ __('message.or_drop_here') }}</div>';
        var file_list = '<ul class="file-list"></ul>';
        var rmv = '<div class="remove"><i class="icon-close icons">x</i></div>'

        $fileupload.each(function() {
            var self = this;
            var $dropfield = $('<div class="drop-field"><div class="drop-area"></div></div>');
            $(self).after($dropfield).appendTo($dropfield.find('.drop-area'));
            var $file_list = $(file_list).appendTo($dropfield);
            $dropfield.append(hasitems);
            $dropfield.append(rmv);
            $(noitems).appendTo($file_list);
            var isDropped = false;
            $(self).on("change", function(evt) {
            if ($(self).val() == "") {
                $file_list.find('li').remove();
                $file_list.append(noitems);
            } else {
                if (!isDropped) {
                $dropfield.removeClass('hover');
                $dropfield.addClass('loaded');
                var files = $(self).prop("files");
                traverseFiles(files);
                }
            }
            });

            $dropfield.on("dragleave", function(evt) {
            $dropfield.removeClass('hover');
            evt.stopPropagation();
            });

            $dropfield.on('click', function(evt) {
            $(self).val('');
            $file_list.find('li').remove();
            $file_list.append(noitems);
            $dropfield.removeClass('hover').removeClass('loaded');
            });

            $dropfield.on("dragenter", function(evt) {
            $dropfield.addClass('hover');
            evt.stopPropagation();
            });

            $dropfield.on("drop", function(evt) {
            isDropped = true;
            $dropfield.removeClass('hover');
            $dropfield.addClass('loaded');
            var files = evt.originalEvent.dataTransfer.files;
            traverseFiles(files);
            isDropped = false;
            });


            function appendFile(file) {
            $file_list.append('<li>' + file.name + '</li>');
            }

            function traverseFiles(files) {
            if ($dropfield.hasClass('loaded')) {
                $file_list.find('li').remove();
            }
            if (typeof files !== "undefined") {
                for (var i = 0, l = files.length; i < l; i++) {
                appendFile(files[i]);
                }
            } else {
                console.log("No support for the File API in this web browser");
            }
            }

        });
        };

        $(document).ready(function() {
        globalFunctions.ddInput('input[type="file"]');
        });
    </script>
    @endsection
</x-master-layout>
