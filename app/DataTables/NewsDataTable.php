<?php

namespace App\DataTables;

use App\Models\News;

use App\Models\Service;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable {

    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */

     public function dataTable(QueryBuilder $query): EloquentDataTable
     {
         return (new EloquentDataTable($query))
         ->editColumn('description', function ($query) {
             return substr($query->description, 0, 50) . '...';
         })
         ->addColumn('action', function ($query) {
             return '<a href="' . route('admin.news.edit', $query->id) . '" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                     <a href="' . route('admin.news.destroy', $query->id) . '" class="btn btn-danger delete-item"><i class="fas fa-trash"></i></a>';
         })
         ->setRowId('id')
         ->rawColumns(['action']);;
     }

     /**
      * Get query source of dataTable.
      *
      * @param \App\Models\Designation $model
      * @return \Illuminate\Database\Eloquent\Builder
      */
        public function query(News $model): QueryBuilder
        {
            return $model->newQuery();
        }

        /**
         * Optional method if you want to use html builder.
         *
         * @return \Yajra\DataTables\Html\Builder
         */

        public function html(): HtmlBuilder
        {
            return $this->builder()
            ->setTableId('news-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([]);
        }

        /**
         * Get columns.
         *
         * @return array
         */
        public function getColumns(): array
        {
            return [
                Column::make('id'),
                Column::make('title'),
                Column::make('description'),
                Column::make('created_at'),
                Column::make('updated_at'),
                Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
            ];
        }

        /**
         * Get filename for export.
         *
         * @return string
         */

        protected function filename(): string
        {
            return 'News_' . date('YmdHis');
        }
}