<?php

namespace App\DataTables;

use App\Models\Property;
use App\Models\Amenity;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

use App\Traits\DataTableTrait;

class AdvertisementPropertyDataTable extends DataTable
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
            ->rawColumns(['property_image','action','status', 'address','added_by']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Property $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Property $model)
    {
        $model = Property::Query()->where('advertisement_property',1)->with('category');

        $model->when(request('city'), function ($query) {
            return $query->where('city', request('city'));
        });

        $model->when(request('customer'), function ($query) {
            return $query->where('added_by', request('customer'));
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
        return [
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('message.srno'))
                ->orderable(false),
                ['data' => 'property_image', 'name' => 'property_image', 'title' => __('message.image'), 'orderable' => false],
                ['data' => 'name', 'name' => 'name', 'title' => __('message.name')],
                ['data' => 'added_by', 'name' => 'added_by', 'title' => __('message.customer')],
                ['data' => 'category.name', 'name' => 'category.name', 'title' => __('message.category'), 'orderable' => false],
                ['data' => 'bhk', 'name' => 'bhk', 'title' => __('message.bhk')],
                ['data' => 'price', 'name' => 'price', 'title' => __('message.price')],
                ['data' => 'city', 'name' => 'city', 'title' => __('message.city')],
                ['data' => 'address', 'name' => 'address', 'title' => __('message.address')],
                ['data' => 'premium_property', 'name' => 'premium_property', 'title' => __('message.premium_property')],
                ['data' => 'status', 'name' => 'status', 'title' => __('message.status')],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')],
                ['data' => 'total_view', 'name' => 'total_view', 'title' => __('message.total_view')],
        ];
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