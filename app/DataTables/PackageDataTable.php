<?php

namespace App\DataTables;

use App\Models\Package;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class PackageDataTable  extends DataTable
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
            ->editColumn('checkbox', function ($row) {
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
            ->editColumn('price', function($package){             
                return getPriceFormat($package->price);
            })
            ->editColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at, true);
            })
            ->editColumn('updated_at', function ($query) {
                return dateAgoFormate($query->updated_at, true);
            })
            ->addColumn('action', function($package){
                $id = $package->id;
                return view('package.action',compact('package','id'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox','action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Package $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Package $model)
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
                ['data' => 'name', 'name' => 'name', 'title' => __('message.name')],
                ['data' => 'duration_unit', 'name' => 'duration_unit', 'title' => __('message.duration_unit')],
                ['data' => 'duration', 'name' => 'duration', 'title' => __('message.duration')],
                ['data' => 'price', 'name' => 'price', 'title' => __('message.price')],
                ['data' => 'property_limit', 'name' => 'property_limit', 'title' => __('message.property_limit')],
                ['data' => 'add_property_limit', 'name' => 'add_property_limit', 'title' => __('message.add_property_limit')],
                ['data' => 'advertisement_limit', 'name' => 'advertisement_limit', 'title' => __('message.advertisement_limit')],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __('message.updated_at')],
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
        return 'Package_' . date('YmdHis');
    }
}
