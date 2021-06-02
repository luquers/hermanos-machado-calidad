<?php

namespace App\DataTables;

use App\Models\User;
use App\Traits\FiltersDatatable;
use App\Models\version;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class versionDataTable extends DataTable
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
                // Filtro revision
                if (request()->has('revision')) {
                    $query->where('versions.revision', 'like', '%' . request('revision') . '%');
                }

                // Filtro user
                if (request()->has('user')) {
                    $query->join('users', 'versions.user_id', '=', 'users.id')
                        ->where('users.name', 'like', '%' . request('user') . '%');
                }
            })
            ->addColumn('user', function($query){
                $user = User::where('id', $query->user_id)->first();
                return $user->name;

            })
            ->addColumn('action', function ($query) {
                return '<div class="btn-group dropdown mr-1 mb-1">
                <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown"
                  data-boundary="window" aria-haspopup="true" aria-expanded="false">
                    '.__("global.menu").'
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="'.route('version.edit', ['version' => $query->id]).'">'.__("global.edit").'</a>
                </div>
              </div>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param version $model
     * @return Builder
     */
    public function query(version $model)
    {
        return $model->newQuery()
            ->join('documents', 'versions.document_id', '=', 'documents.id')
            ->where('documents.id', '=', request('document')->id)
            ->select('versions.id', 'versions.revision', 'versions.date', 'versions.description', 'versions.user_id')
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
                'url' => route('version.index', ['document' => request('document')->id]),
                'data' => 'function(d) {
                    d.revision = $("#revision").val();
                    d.user = $("#user").val();
                }'
            ])
            ->setTableId('version-table')
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
                Column::make("revision")->title(__("global.revision")),
                Column::make("description")->title(__("global.description")),
                Column::make("date")->title(__("global.date")),
                Column::make("user")->title(__("global.user"))
            ];
        } else{
            return [
                Column::make("revision")->title(__("global.revision")),
                Column::make("description")->title(__("global.description")),
                Column::make("date")->title(__("global.date")),
                Column::make("user")->title(__("global.user")),

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
        return 'version_' . date('YmdHis');
    }
}
