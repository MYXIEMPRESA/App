<?php

namespace App\DataTables;

use App\Models\LanguageTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class LanguageTableDataTable extends DataTable
{
    use DataTableTrait;
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" class="select-table-row-checked-values" id="datatable-row-' . $row->id . '" name="datatable_ids[]" value="' . $row->id . '" onclick="dataTableRowCheck(' . $row->id . ')">';
            })
            ->editColumn('status', function($query) {
                $status = 'warning';
                $status_name = 'inactive';
                switch ($query->status) {
                    case 0:
                        $status = 'warning';
                        $status_name = __('message.inactive');
                        break;
                    case 1:
                        $status = 'primary';
                        $status_name = __('message.active');
                        break;
                }
                return '<span class="text-capitalize badge bg-'.$status.'">'.$status_name.'</span>';
            })
            ->addColumn('language_image', function($query){
                return '<img src='.getSingleMedia($query , 'language_image').' width="40" height="40" >';
            })
            ->editcolumn('language_id',function($query){
                return optional($query->LanguageDefaultList)->languageName;
            })
            ->filterColumn('language_id', function($query, $keyword) {
                return $query->orWhereHas('LanguageDefaultList', function($q) use($keyword) {
                    $q->where('languageName', 'like', "%{$keyword}%");
                });
            })
          
            ->editColumn('is_default',function($language_table){
                return $language_table->is_default == 0 ? __('message.no') : __('message.yes');
            })

            ->addColumn('action', function($language_table){
                $id = $language_table->id;
                return view('languagetable.action',compact('language_table','id'))->render();
            })
            ->addIndexColumn()
            ->order(function ($query) {
                if (request()->has('order')) {
                    $order = request()->order[0];
                    $column_index = $order['column'];

                    $column_name = 'language_name';
                    $direction = 'asc';
                    if( $column_index != 0) {
                        $column_name = request()->columns[$column_index]['data'];
                        $direction = $order['dir'];
                    }
    
                    $query->orderBy($column_name, $direction);
                }
            })
            ->setRowClass(function ($row) {
                return $row->is_default == 1 ? 'table-primary' : '';
            })
            ->rawColumns(['checkbox','status','action','language_image']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LanguageTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LanguageTable $model)
    {
        return $model->newQuery()->orderByDesc('is_default');
    }


    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('checkbox')
            ->searchable(false)
            ->orderable(false)
            ->title('<input type="checkbox" class ="select-all-table" name="select_all" id="select-all-table">')
            ->width(10),
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('message.srno'))
                ->orderable(false),
                ['data' => 'language_image', 'name' => 'language_image', 'title' => __('message.image'), 'orderable' => false],
            ['data' => 'language_id', 'name' => 'language_id', 'title' => __('message.default_language')],
            ['data' => 'language_name', 'name' => 'language_name', 'title' => __('message.language_name')],
            ['data' => 'language_code', 'name' => 'language_code', 'title' => __('message.language_code')],
            ['data' => 'country_code', 'name' => 'country_code', 'title' => __('message.country_code')],
            ['data' => 'is_default', 'name' => 'is_default', 'title' => __('message.is_default_language')],
            ['data' => 'status', 'name' => 'status', 'title' => __('message.status')],

            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->title(__('message.action'))
                  ->width(60)
                  ->addClass('text-center hide-search'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'LanguageTable_' . date('YmdHis');
    }
}
