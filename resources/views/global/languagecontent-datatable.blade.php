<x-master-layout :assets="$assets ?? []">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch card-height">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">{{ $pageTitle ?? ''}}</h4>
                        </div>
                        <div class="card-header-toolbar">
                            <?php echo $button; ?>
                            @if(isset($pdfbutton))
                                {!! $pdfbutton !!}
                            @endif
                            @if(isset($import_file_button))
                                {!! $import_file_button !!}
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header-toolbar">
                            @include('languagecontent.languagecontent-filter')
                            @if(isset($delete_checkbox_checkout))
                               {!! $delete_checkbox_checkout !!}
                            @endif
                        </div>
                        {{ $dataTable->table(['class' => 'table  w-100'],false) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('bottom_script')
       {{ $dataTable->scripts() }}
        <script>
            $(document).ready(function() {
                $(document).find('.select2Clear').select2({
                    width: '100%',
                    allowClear: true
                });
            });
        </script>
    @endsection
</x-master-layout>
