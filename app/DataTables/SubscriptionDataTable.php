<?php

namespace App\DataTables;

use App\Models\Subscription;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

use App\Traits\DataTableTrait;

class SubscriptionDataTable extends DataTable
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

            ->editColumn('status', function($query) {
                $status = 'warning';
                switch ($query->status) {
                    case 'active':
                        $status = 'primary';
                        break;
                    case 'inactive':
                        $status = 'warning';
                        break;
                }
                return '<span class="text-capitalize badge bg-'.$status.'">'.$query->status.'</span>';
            })

            ->addColumn('display_name', function($query){             
                $user_data = optional($query->user);
                $action_type = 'user_action';
                return view('subscription.action',compact('user_data','action_type'))->render();
            })
            ->filterColumn('display_name', function($query, $keyword) {
                return $query->orWhereHas('user', function($q) use($keyword) {
                    $q->where('display_name', 'like', "%{$keyword}%");
                });
            })

            ->editColumn('subscription_start_date', function ($query) {
                return dateAgoFormate($query->subscription_start_date, true);
            })

            ->editColumn('subscription_end_date', function ($query) {
                return dateAgoFormate($query->subscription_end_date, true);
            })

            ->editColumn('cancel_date', function ($query) {
                return dateAgoFormate($query->cancel_date, true);
            })

            ->editColumn('total_amount', function($total_amount){             
               return getPriceFormat($total_amount->total_amount);
            })
            ->addColumn('action', function($subscription){
                $user_id = $subscription->user_id;
                $action_type = 'action';
                return view('subscription.action',compact('user_id','action_type'))->render();
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
            ->rawColumns(['action','status','total_amount','display_name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Subscription $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subscription $model)
    {
        $model = Subscription::query()->with('package');

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
            ];
        if ($this->user_id == null) {
            $columns[] = ['data' => 'display_name', 'name' => 'display_name', 'title' => __('message.user'), 'orderable' => false];
        }
        $columns[] = ['data' => 'package.name', 'name' => 'package.name', 'title' => __('message.package'), 'orderable' => false];
        $columns[] = ['data' => 'total_amount', 'name' => 'total_amount', 'title' => __('message.total_amount')];
        $columns[] = ['data' => 'payment_type', 'name' => 'payment_type', 'title' => __('message.payment_type')];
        $columns[] = ['data' => 'subscription_start_date', 'name' => 'subscription_start_date', 'title' => __('message.subscription_start_date')];
        $columns[] = ['data' => 'subscription_end_date', 'name' => 'subscription_end_date', 'title' => __('message.subscription_end_date')];
        $columns[] = ['data' => 'cancel_date', 'name' => 'cancel_date', 'title' => __('message.cancel_date')];
        $columns[] = ['data' => 'status', 'name' => 'status', 'title' => __('message.status')];

        $actionColumn = Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->title(__('message.action'))
            ->width(60)
            ->addClass('text-center hide-search');
    
        if ($this->user_id != null) {
            return $columns;
        }
        $columns[] = $actionColumn;
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Subscription' . date('YmdHis');
    }
}