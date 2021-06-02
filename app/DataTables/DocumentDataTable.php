<?php

namespace App\DataTables;

use App\Traits\FiltersDatatable;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class DocumentDataTable extends DataTable
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
                    $query->where('documents.name', 'like', '%' . request('name') . '%');
                }

                // Filtro code
                if (request()->has('code')) {
                    $query->where('documents.code', 'like', '%' . request('code') . '%');
                }
            })
            ->editColumn('link', function($query ){
                $link = $query->link;
                if ($link == null) {
                    $link = '#';
                }
                return '<a href="' . url($link) . '" class="" target="_blank">'. __('global.open_document') .'</a>';
            })
            ->addColumn('changes_list', function ($query){
                return '<a class="btn btn-sm btn-success h-2" href="'.route('document.download', ['document' => $query->id]).'">'.__("global.changes_list_download").'</a>';
            })
            ->addColumn('versions', function ($query){
                return '<a class="btn btn-sm btn-info h-2" href="'.route('version.index', ['document' => $query->id]).'">'.__("global.versions").'</a>';
            })
            ->addColumn('action', function ($query) {
                return '<div class="btn-group dropdown mr-1 mb-1">
                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                  data-boundary="window" aria-haspopup="true" aria-expanded="false">
                    '.__("global.menu").'
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="'.route('document.edit', ['document' => $query->id]).'">'.__("global.edit").'</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete-document" href="#" data-href="'.route('document.destroy', ['document' => $query->id]).'">'.__('global.delete').'</a>
                </div>
              </div>';
            })
            ->escapeColumns('versions');

    }

    /**
     * Get query source of dataTable.
     *
     * @param Document $model
     * @return Builder
     */
    public function query(Document $model)
    {
        return $model->newQuery()
            ->join('procedures', 'documents.procedure_id', '=', 'procedures.id')
            ->where('procedures.id', '=', request('procedure')->id)
            ->select('documents.id', 'documents.code', 'documents.name', 'documents.link')
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
                'url' => route('document.index', ['procedure' => request('procedure')->id]),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                }'
            ])
            ->setTableId('document-table')
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
        if(Auth::user()->hasRole('user')) {
            return [
                Column::make("code")->title(__("global.code")),
                Column::make("name")->title(__("global.name")),
                Column::make("link")->title(__("global.link")),
                Column::computed('changes_list')
                    ->title(__('global.changes_list'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
                Column::computed('versions')
                    ->title(__('global.versions'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center')
            ];
        } else {
            return [
                Column::make("code")->title(__("global.code")),
                Column::make("name")->title(__("global.name")),
                Column::make("link")->title(__("global.link")),
                Column::computed('changes_list')
                    ->title(__('global.changes_list'))
                    ->orderable(false)
                    ->exportable(false)
                    ->printable(false)
                    ->width(60)
                    ->addClass('text-center'),
                Column::computed('versions')
                    ->title(__('global.versions'))
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
        return 'Document_' . date('YmdHis');
    }
}
