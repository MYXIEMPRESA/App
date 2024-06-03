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
                            @if(isset($download_file_button))
                            {!! $download_file_button !!}
                            @endif
                            @if(isset($filter_file_button))
                                {!! $filter_file_button !!}
                            @endif
                            @if(isset($reset_file_button))
                                {!! $reset_file_button !!}
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-header-toolbar">
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
    @endsection
</x-master-layout>
