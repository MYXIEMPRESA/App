<?php

namespace App\DataTables;

use App\Models\LanguageContent;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\Traits\DataTableTrait;

class LanguageContentDataTable extends DataTable
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
            ->editColumn('language_id', function($languagecontent){
                return optional($languagecontent->languageTable)->language_name;
            })
            ->filterColumn('language_id', function($query, $keyword) {
                return $query->orWhereHas('languageTable', function($q) use($keyword) {
                    $q->where('language_name', 'like', "%{$keyword}%");
                });
            })

            ->editColumn('keyword_id', function($languagecontent){
                return optional($languagecontent->languageKeyword)->keyword_name;
            })
            ->filterColumn('keyword_id', function($query, $keyword) {
                return $query->orWhereHas('languageKeyword', function($q) use($keyword) {
                    $q->where('keyword_name', 'like', "%{$keyword}%");
                });
            })

            ->editColumn('screen_id', function($languagecontent){
                return optional($languagecontent->screen)->screenName;
            })
            ->filterColumn('screen_id', function($query, $keyword) {
                return $query->orWhereHas('screen', function($q) use($keyword) {
                    $q->where('screenName', 'like', "%{$keyword}%");
                });
            })

            ->addColumn('action', function($languagecontent){
                $id = $languagecontent->id;
                return view('languagecontent.action',compact('languagecontent','id'))->render();
            })
            ->addIndexColumn()
            ->order(function ($query) {
                if (request()->has('order')) {
                    $order = request()->order[0];
                    $column_index = $order['column'];

                    $column_name = 'keyword_id';
                    $direction = 'asc';
                    if( $column_index != 0) {
                        $column_name = request()->columns[$column_index]['data'];
                        $direction = $order['dir'];
                    }
    
                    $query->orderBy($column_name, $direction);
                }
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\LanguageContent $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(LanguageContent $model)
    {
        $model = LanguageContent::query();

        $query = $model->whereHas('languageTable', function($q){
            $q->where('status' , 1);
        });
   
        $language = isset($_GET['language']) ? $_GET['language'] : null;
        if( $language != null ) {
            $model = $model->where('language_id',$language);
        }
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;
        if( $keyword != null ) {
            $model = $model->where('keyword_id',$keyword);
        }
        $screen = isset($_GET['screen']) ? $_GET['screen'] : null;
        if( $screen != null ) {
            $model = $model->where('screen_id',$screen);
        }   

        return $this->applyScopes($model,$query);
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
            ['data' => 'language_id', 'name' => 'language_id', 'title' => __('message.language_name')],
            ['data' => 'screen_id', 'name' => 'screen_id', 'title' => __('message.screen_name')],
            ['data' => 'keyword_id', 'name' => 'keyword_id', 'title' => __('message.keyword_name')],
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
        return 'LanguageContent_' . date('YmdHis');
    }
}
