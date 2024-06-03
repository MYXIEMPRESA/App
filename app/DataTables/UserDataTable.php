<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;
use Carbon\Carbon;

class UserDataTable extends DataTable
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
            ->editColumn('status', function($data) {
                $action_type = 'status';
                return view('users.action',compact('data','action_type'))->render();
            })

            ->editColumn('email', function($query) {
                return auth()->user()->hasRole('admin') ? $query->email : maskSensitiveInfo('email', $query->email);
            })

            ->editColumn('contact_number', function($query) {
                return auth()->user()->hasRole('admin') ? $query->contact_number : maskSensitiveInfo('contact_number', $query->contact_number);
            })

            ->addColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at, true);
            })

            ->addColumn('action', function($users){
                $id = $users->id;
                $action_type = 'action';
                return view('users.action',compact('users','action_type','id'))->render();
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
            ->rawColumns(['checkbox','action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        $model = User::whereNotIn('user_type',['admin','user']);
        return $model->applyScopes($model);

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
                ['data' => 'first_name', 'name' => 'first_name', 'title' => __('message.first_name')],
                ['data' => 'last_name', 'name' => 'last_name', 'title' => __('message.last_name')],
                ['data' => 'email', 'name' => 'email', 'title' => __('message.email')],
                ['data' => 'contact_number', 'name' => 'contact_number', 'title' => __('message.contact_number')],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')],
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
        return 'User_' . date('YmdHis');
    }
}
