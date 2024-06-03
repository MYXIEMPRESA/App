<?php

namespace App\DataTables;

use App\Models\ExtraPropertyLimit;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class ExtraPropertyLimitDataTable  extends DataTable
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
            ->editColumn('price', function($extrapropertylimit){             
                return getPriceFormat($extrapropertylimit->price);
            })
            ->editColumn('type', function($extrapropertylimit){             
                return __('message.'.$extrapropertylimit->type);
            })
            ->editColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at, true);
            })
            ->editColumn('updated_at', function ($query) {
                return dateAgoFormate($query->updated_at, true);
            })
            ->addColumn('action', function($extrapropertylimit){
                $id = $extrapropertylimit->id;
                return view('extrapropertylimit.action',compact('extrapropertylimit','id'))->render();
            })
            ->addIndexColumn()
            ->rawColumns([ 'checkbox','action' ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ExtraPropertyLimit $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ExtraPropertyLimit $model)
    {
        return $model->newQuery();
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
                ['data' => 'limit', 'name' => 'limit', 'title' => __('message.limit')],
                ['data' => 'price', 'name' => 'price', 'title' => __('message.price')],
                ['data' => 'type', 'name' => 'type', 'title' => __('message.type')],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __('message.updated_at')],
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
        return 'ExtraPropertyLimit_' . date('YmdHis');
    }
}
