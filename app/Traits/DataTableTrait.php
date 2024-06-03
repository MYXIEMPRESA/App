<?php


namespace App\Traits;

use Yajra\DataTables\Services\DataTable;

trait DataTableTrait {

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->parameters($this->getBuilderParameters());
    }


    public function getBuilderParameters()
    {
        return [
            'lengthMenu'   => [[10, 50, 100, 500, -1], [10, 50, 100, 500, __('pagination.all')]],
            //"sDom"         =>  "<'row p-3 '<'col-md-5' l><'col-md-7 d-flex align-items-center justify-content-end' <'' B><'mr-2' f>>> <'row' <'col-md-12 table-responsive' rt>>" .
                "<'row'<'col-sm-6 d-flex' <'pt-1' ><'ml-2 mb-3' i>><'col-sm-6 text-sm-center' <'mb-3' p>>>",
            
            // 'sDom'          => '<"row justify-content-sticky""<"col-lg-5" B> <"col-lg-6 ml-3"<"row"<"col-md-1" B><"col-md-5" l><"mt-2 col-md-6"f>>>> <"table-responsive my-3" rt><"row align-items-center" <"col-md-6" i><"col-md-6" p>><"clear">',
            'sDom'          => '<"row align-items-center"<"col-md-2"><"col-md-6" B><"col-md-4"f>><"table-responsive my-3" rt><"d-flex" <"flex-grow-1" l><"" i><"" p>><"clear">',

            'buttons' => [
                [
                    'extend' => 'print',
                    'text' => '<i class="fa fa-print"></i> Print',
                    'className' => 'btn btn-primary btn-sm',
                ],
                [
                    'extend' => 'csv',
                    'text' => '<i class="fa fa-file"></i> CSV',
                    'className' => 'btn btn-primary btn-sm',
                ]
            ],
            'drawCallback' => "function () {
                $('.dataTables_paginate > .pagination').addClass('justify-content-end mb-0');
                $('#dataTableBuilder th:first-child').removeClass('sorting_asc');
                if($('.image-popup-vertical-fit').length > 0){
                    $('.image-popup-vertical-fit').magnificPopup({
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        mainClass: 'mfp-with-zoom',
                        zoom: {
                            enabled: true, 
                            duration: 350,
                        }          
                    });
                }
            }",
            'language' => [
                'search' => '',
                'searchPlaceholder' => __('pagination.search'),
                'lengthMenu' =>  __('pagination.show'). ' _MENU_ ' .__('pagination.entries'),
                'zeroRecords' => __('pagination.no_records_found'),
                'info' => __('pagination.showing') .' _START_ '.__('pagination.to') .' _END_ ' . __('pagination.of').' _TOTAL_ ' . __('pagination.entries'), 
                'infoFiltered' => __('pagination.filtered_from_total') . ' _MAX_ ' . __('pagination.entries'),
                'infoEmpty' => __('pagination.showing_entries'),
                'paginate' => [
                    'previous' => __('pagination.previous'),
                    'next' => __('pagination.next'),
                ],
            ],
            'initComplete' => "function () {
                $('#dataTableBuilder_wrapper .dt-buttons button').removeClass('btn-secondary');
                this.api().columns().every(function () {

                });
            },
            createdRow: (row, data, dataIndex, cells) => {

            }"
        ];
    }
}
