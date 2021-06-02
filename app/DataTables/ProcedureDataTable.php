<?php

namespace App\DataTables;

use App\Traits\FiltersDatatable;
use App\Models\Procedure;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class ProcedureDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filter(function($query) {
                // Filtro name
                if (request()->has('name')) {
                    $query->where('procedures.name', 'like', '%' . request('name') . '%');
                }

                // Filtro code
                if (request()->has('code')) {
                    $query->where('procedures.code', 'like', '%' . request('code') . '%');
                }
            })
            ->addColumn('document_tree', function ($query){
                return '<a class="btn btn-sm btn-success h-2" href="'.route('procedure.download', ['procedure' => $query->id]).'">'.__("global.document_tree_download").'</a>';
            })
            ->addColumn('documents', function ($query){
                return '<a class="btn btn-sm btn-info h-2" href="'.route('document.index', ['procedure' => $query->id]).'">'.__("global.documents").'</a>';
            })
            ->addColumn('action', function ($query) {
                return '<div class="btn-group dropdown mr-1 mb-1">
                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                  data-boundary="window" aria-haspopup="true" aria-expanded="false">
                    '.__("global.menu").'
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="'.route('procedure.edit', ['procedure' => $query->id]).'">'.__("global.edit").'</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete-procedure" href="#" data-href="'.route('procedure.destroy', ['procedure' => $query->id]).'">'.__('global.delete').'</a>
                </div>
              </div>';
            })
            ->escapeColumns('documents');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Procedure $model
     * @return Builder
     */
    public function query(Procedure $model)
    {
        return $model->newQuery()
            ->join('chapters', 'procedures.chapter_id', '=', 'chapters.id')
            ->where('chapters.id', '=', request('chapter')->id)
            ->select('procedures.id', 'procedures.code', 'procedures.name', 'procedures.description')
            ;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return YajraBuilder
     */
    public function html()
    {
        return $this->builder()
            ->parameters([
                'language' => [
                    'url' => asset('/vendor/datatables/lang/'.app()->getLocale().'.json'),
                ],
                'filter' => false
            ])
            ->postAjax([
                'url' => route('procedure.index', ['chapter' => request('chapter')->id]),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                }'
            ])
            ->setTableId('procedure-table')
            ->columns($this->getColumns())
            ->dom('B <"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>> rt <"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>')
            ->orderBy(1, 'asc')
            ->buttons(
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {

        if(Auth::user()->hasRole('user')){
            return [
                Column::make("code")->title(__("global.code")),
                Column::make("name")->title(__("global.name")),
                Column::make("description")->title(__("global.description")),
                Column::computed('document_tree')
                    ->title(__('global.document_tree'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
                Column::computed('documents')
                    ->title(__('global.documents'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),

            ];
        } else {
            return [
                Column::make("code")->title(__("global.code")),
                Column::make("name")->title(__("global.name")),
                Column::make("description")->title(__("global.description")),
                Column::computed('document_tree')
                    ->title(__('global.document_tree'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
                Column::computed('documents')
                    ->title(__('global.documents'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),

                Column::computed('action')
                    ->title(__('global.action'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
            ];
        }

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Procedure_' . date('YmdHis');
    }
}
