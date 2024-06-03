<?php

namespace App\DataTables;

use App\Models\LanguageKeyword;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class LanguageKeywordDataTable extends DataTable
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
            ->addColumn('action', function($languagekeyword){
                $id = $languagekeyword->id;
                return view('languagekeyword.action',compact('languagekeyword','id'))->render();
            })

            ->editColumn('screen_id', function($languagekeyword){
                return optional($languagekeyword->screen)->screenName;
            })
            ->filterColumn('screen_id', function($query, $keyword) {
                return $query->orWhereHas('screen', function($q) use($keyword) {
                    $q->where('screenName', 'like', "%{$keyword}%");
                });
            })

            ->addIndexColumn()
            ->order(function ($query) {
                if (request()->has('order')) {
                    $order = request()->order[0];
                    $column_index = $order['column'];
                    
                    $column_name = 'screen_id';
                    $direction = 'asc';
                    if( $column_index != 0) {
                        $column_name = request()->columns[$column_index]['data'];
                        $direction = $order['dir'];
                    }
    
                    $query->orderBy($column_name, $direction);
                }
            })
            ->rawColumns(['checkbox','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LanguageKeyword $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LanguageKeyword $model)
    {
        $model = LanguageKeyword::query();
        
        $screen = isset($_GET['screen']) ? $_GET['screen'] : null;
        if( $screen != null ) {
            $model = $model->where('screen_id',$screen);
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
            ->orderable(false)
            ->title('<input type="checkbox" class ="select-all-table" name="select_all" id="select-all-table">')
            ->width(10),
            Column::make('DT_RowIndex')
                ->searchable(false)
                ->title(__('message.srno'))
                ->orderable(false),
            ['data' => 'screen_id', 'name' => 'screen_id', 'title' => __('message.screen_name')],
            ['data' => 'keyword_id', 'name' => 'keyword_id', 'title' => __('message.keyword_id')],
            ['data' => 'keyword_name', 'name' => 'keyword_name', 'title' => __('message.keyword_name')],
            ['data' => 'keyword_value', 'name' => 'keyword_value', 'title' => __('message.keyword_value')],
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
        return 'LanguageKeyword_' . date('YmdHis');
    }
}
