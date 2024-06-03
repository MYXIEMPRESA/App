<?php

namespace App\DataTables;

use App\Models\ExtraPropertyLimitTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class ExtraPropertyLimitTransactionDataTable extends DataTable
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
            ->editColumn('extra_property_type', function($query){             
                return __('message.'.$query->extra_property_type);
            })

            ->editColumn('amount', function($amount){             
               return getPriceFormat($amount->amount);
            })

            ->editColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at,true);
            })

            ->addIndexColumn()
            ->order(function ($query) {
                if (request()->has('order')) {
                    $order = request()->order[0];
                    $column_index = $order['column'];

                    $column_name = 'id';
                    $direction = 'desc';
                    if( $column_index != 0) {
                        $column_name = request()->columns[$column_index]['data'];
                        $direction = $order['dir'];
                    }
    
                    $query->orderBy($column_name, $direction);
                }
            })
            ->rawColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ExtraPropertyLimitTransaction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ExtraPropertyLimitTransaction $model)
    {
        $model = ExtraPropertyLimitTransaction::query();

        if( $this->user_id != null ) {
            $model = $model->where('user_id', $this->user_id);
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
        $columns = [
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('message.srno'))
                ->orderable(false),
            ['data' => 'limit', 'name' => 'limit', 'title' => __('message.limit')],
            ['data' => 'amount', 'name' => 'amount', 'title' => __('message.total_amount')],
            ['data' => 'extra_property_type', 'name' => 'extra_property_type', 'title' => __('message.extrapropertylimit')],
            ['data' => 'payment_type', 'name' => 'payment_type', 'title' => __('message.payment_type')],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.purchase_date')],
        ];
        if ($this->user_id != null) {
            return $columns;
        }
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ExtraPropertyLimitTransaction' . date('YmdHis');
    }
}