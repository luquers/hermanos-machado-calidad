<?php

namespace App\DataTables;

use App\Traits\FiltersDatatable;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class ChapterDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        if (request('chapters_softDelete') == 2) {
            $query->onlyTrashed();
        }
        return datatables()
            ->eloquent($query)
            ->filter(function($query) {
                // Filtro name
                if (request()->has('name')) {
                    $query->where('name', 'like', '%' . request('name') . '%');
                }

                // Filtro code
                if (request()->has('code')) {
                    $query->where('code', 'like', '%' . request('code') . '%');
                }
            })
            ->addColumn('procedures', function ($query){
                return '<a class="btn btn-sm btn-info h-2" href="'.route('procedure.index', ['chapter' => $query->id]).'">'.__("global.procedures").'</a>';
            })
            ->addColumn('action', function ($query) {
                if (request('chapters_softDelete') == 2){
                    return '<div class="btn-group dropdown mr-1 mb-1">
                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                  data-boundary="window" aria-haspopup="true" aria-expanded="false">
                    '.__("global.menu").'
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="' . route('chapter.restore', ['chapter' => $query->id]) . '">' . __("global.restore") . '</a>
                    <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="'.route('chapter.edit', ['chapter' => $query->id]).'">'.__("global.edit").'</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete-chapter" href="#" data-href="'.route('chapter.destroy', ['chapter' => $query->id]).'">'.__('global.delete').'</a>
                </div>
              </div>';
                } else{
                    return '<div class="btn-group dropdown mr-1 mb-1">
                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                  data-boundary="window" aria-haspopup="true" aria-expanded="false">
                    '.__("global.menu").'
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="'.route('chapter.edit', ['chapter' => $query->id]).'">'.__("global.edit").'</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item delete-chapter" href="#" data-href="'.route('chapter.destroy', ['chapter' => $query->id]).'">'.__('global.delete').'</a>
                </div>
              </div>';
                }

            })
            ->escapeColumns('procedures');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Chapter $model
     * @return Builder
     */
    public function query(Chapter $model)
    {
        return $model->newQuery();
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
                'url' => route('chapter.index'),
                'data' => 'function(d) {
                    d.code = $("#code").val();
                    d.name = $("#name").val();
                    d.chapters_softDelete = $("#chapters_softDelete").val();
                }'
            ])
            ->setTableId('chapter-table')
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
                Column::computed('procedures')
                    ->title(__('global.procedures'))
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
                Column::computed('procedures')
                    ->title(__('global.procedures'))
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
        return 'Chapter_' . date('YmdHis');
    }
}
