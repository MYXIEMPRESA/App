<?php

namespace App\DataTables;

use App\Models\Article;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;
use App\Models\Tags;

class ArticleDataTable extends DataTable
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
            ->addColumn('article_image', function($article){
                return '<img src='.getSingleMedia($article , 'article_image').' width="45" height="45" >';
            })
            ->editColumn('tags_id', function($article){
                return Tags::whereIn('id', $article->tags_id)->get()->mapWithKeys(function ($item) {
                    return [ $item->id => $item->name ];
                })->implode(',');
            })
            ->editColumn('created_at', function ($query) {
                return dateAgoFormate($query->created_at, true);
            })
            ->addColumn('action', function($article){
                $id = $article->id;
                return view('article.action',compact('article','id'))->render();
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
            ->rawColumns(['checkbox','article_image','action','status']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Article $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Article $model)
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
                ['data' => 'article_image', 'name' => 'article_image', 'title' => __('message.image'), 'orderable' => false],
                ['data' => 'tags_id', 'name' => 'tags_id', 'title' => __('message.tags')],
                ['data' => 'status', 'name' => 'status', 'title' => __('message.status')],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => __('message.created_at')],
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
        return 'Article_' . date('YmdHis');
    }
}
