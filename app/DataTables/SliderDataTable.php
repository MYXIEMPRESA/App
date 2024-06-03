<?php

namespace App\DataTables;

use App\Models\Slider;
use App\Models\Property;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

use App\Traits\DataTableTrait;

class SliderDataTable extends DataTable
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

            ->addColumn('slider_image', function($slider){
                return '<img src='.getSingleMedia($slider , 'slider_image').' width="40" height="40" >';
            })

            ->addColumn('category', function($query) {
                return optional($query->category)->name;
            })
            ->filterColumn('category', function($query, $keyword) {
                return $query->orWhereHas('category', function($q) use($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })

            ->addColumn('property', function($query) {
                return optional($query->property)->name;
            })
            ->filterColumn('property', function($query, $keyword) {
                return $query->orWhereHas('property', function($q) use($keyword) {
                    $q->where('name', 'like', "%{$keyword}%");
                });
            })

            ->addColumn('property_city', function($query) {
                return optional($query->property)->city;
            })
            ->filterColumn('property_city', function($query, $keyword) {
                return $query->orWhereHas('property', function($q) use($keyword) {
                    $q->where('city', 'like', "%{$keyword}%");
                });
            })

            ->addColumn('action', function($slider){
                $id = $slider->id;
                return view('slider.action',compact('slider','id'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox','slider_image','action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Slider $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Slider $model)
    {
        $model = Slider::query();

        $city = isset($_GET['city']) ? $_GET['city'] : null;
        if( $city != null ) {
            $model = $model->whereHas('property', function ($q) use($city) {
                $q->where('city', $city);
            });
        }
        return $this->applyScopes($model);
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
            ->title('<input type="checkbox" class ="select-all-table" name="select_all" id="select-all-table">')
            ->width(10)
            ->orderable(false),
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('message.srno'))
                ->orderable(false),
                ['data' => 'slider_image', 'name' => 'slider_image', 'title' => __('message.image'), 'orderable' => false],
                ['data' => 'category', 'name' => 'category', 'title' => __('message.category')],
                ['data' => 'property', 'name' => 'property', 'title' => __('message.property')],
                ['data' => 'property_city', 'name' => 'property_city', 'title' => __('message.city')],
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
        return 'slider' . date('YmdHis');
    }
}