<?php

namespace App\DataTables;

use App\Models\Property;
use App\Models\Amenity;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

use App\Traits\DataTableTrait;

class PropertyDataTable extends DataTable
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
            ->addColumn('bhk', function($property){
                return $property->bhk != 0 ? $property->bhk.' '.__('message.bhk') : __('message.none');
            })
            ->filterColumn('bhk', function ($query, $keyword) {
                $query->where('bhk', 'LIKE', '%' . $keyword . '%');
            })
            ->editColumn('price', function($property){             
                return getPriceFormat($property->price);
            })

            ->addColumn('property_image', function($property){
                return '<a href="'.getSingleMedia($property , 'property_image').'" class="image-popup-vertical-fit"><img src="'.getSingleMedia($property , 'property_image').'" width="40" height="40" ></a>';
            })

            ->editColumn('category.name', function($property) {
                return optional($property->category)->name;
            })

            ->editColumn('address', function($property) {
                return isset($property->address) ? '<span data-toggle="tooltip" title="'.$property->address.'">'.stringLong($property->address, 'title').'</span>' : null;
            })

            ->editColumn('premium_property', function($query) {
                switch ($query->premium_property) {
                    case 0:
                        $premium_property = __('message.no');
                        break;
                    case 1:
                        $premium_property = __('message.yes');
                        break;
                }
                return $premium_property;
            })

            ->editColumn('added_by', function($property) {
                $user_data = optional($property->user);
                return view('property.added_by_view',compact('user_data'))->render();
            })

            ->filterColumn('added_by', function($query, $keyword) {
                return $query->orWhereHas('user', function($q) use($keyword) {
                    $q->where('display_name', 'like', "%{$keyword}%");
                });
            })

            ->editColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at, true);
            })

            ->addColumn('action', function($property){
                $id = $property->id;
                return view('property.action',compact('property','id'))->render();
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
            ->rawColumns(['checkbox','property_image','action','status', 'address','added_by']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model)
    {
        $model = Property::Query()->with('category');

        if( $this->user_id != null ) {
            $model = $model->where('added_by', $this->user_id);
        }

        $model->when(request('category'), function ($query) {
            return $query->where('category_id', request('category'));
        });

        $model->when(is_numeric(request('start_price')), function ($query) {
            return $query->where('price', '>=', request('start_price'));
        });

        $model->when(is_numeric(request('end_price')), function ($query) {
            return $query->where('price', '<=', request('end_price'));
        });

        $model->when(is_numeric(request('start_age_of_property')), function ($query) {
            return $query->where('age_of_property', '>=', request('start_age_of_property'));
        });

        $model->when(is_numeric(request('end_age_of_property')), function ($query) {
            return $query->where('age_of_property', '<=', request('end_age_of_property'));
        });

        $model->when(is_numeric(request('start_brokerage')), function ($query) {
            return $query->where('brokerage', '>=', request('start_brokerage'));
        });

        $model->when(is_numeric(request('end_brokerage')), function ($query) {
            return $query->where('brokerage', '<=', request('end_brokerage'));
        });

        $model->when(request('city'), function ($query) {
            return $query->where('city', request('city'));
        });

        $model->when(is_numeric(request('bhk')), function ($query) {
            return $query->where('bhk', request('bhk'));
        });

        $model->when(is_numeric(request('furnished_type')), function ($query) {
            return $query->where('furnished_type', request('furnished_type'));
        });

        $model->when(is_numeric(request('property_for')), function ($query) {
            return $query->where('property_for', request('property_for'));
        });

        return $this->applyScopes($model);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {           

        $columns = [];
        if ($this->user_id == null) {
            $columns[] =  Column::make('checkbox')
            ->searchable(false)
            ->orderable(false)
            ->title('<input type="checkbox" class ="select-all-table" name="select_all" id="select-all-table">')
            ->width(10);
        }

        $columns[] = Column::make('DT_RowIndex')
            ->searchable(false)
            ->title(__('message.srno'))
            ->orderable(false);

        $columns[] = ['data' => 'property_image', 'name' => 'property_image', 'title' => __('message.image'), 'orderable' => false];
        $columns[] = ['data' => 'name', 'name' => 'name', 'title' => __('message.name')];
        if ($this->user_id == null) {
            $columns[] = ['data' => 'added_by', 'name' => 'added_by', 'title' => __('message.customer')];
        }
        $columns[] = ['data' => 'category.name', 'name' => 'category.name', 'title' => __('message.category'), 'orderable' => false];
        $columns[] = ['data' => 'bhk', 'name' => 'bhk', 'title' => __('message.bhk')];
        $columns[] = ['data' => 'price', 'name' => 'price', 'title' => __('message.price')];
        $columns[] = ['data' => 'address', 'name' => 'address', 'title' => __('message.address')];
        $columns[] = ['data' => 'premium_property', 'name' => 'premium_property', 'title' => __('message.premium_property')];
        $columns[] = ['data' => 'status', 'name' => 'status', 'title' => __('message.status')];
        $columns[] = ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')];
        if ($this->user_id == null) {
            $columns[] = ['data' => 'total_view', 'name' => 'total_view', 'title' => __('message.total_view')];
        }
        $columns[] = Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->title(__('message.action'))
            ->addClass('text-center hide-search');
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'property' . date('YmdHis');
    }
}