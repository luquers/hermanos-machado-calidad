<?php

namespace App\DataTables;

use App\Traits\FiltersDatatable;
use App\Models\Audit;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Builder as YajraBuilder;

class AuditDataTable extends DataTable
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
            ->filter(function ($query) {
                //$this->filterColumns($query, 'complete', 'models.userContact');

                if (request()->has('name')) {
                    $query->where('name', 'like', '%'.request('name').'%');
                }
                if (request()->has('audit_models')) {
                    $query->where('auditable_type', 'like', '%'.request('audit_models').'%');
                }
                if (request()->has('audit_events')) {
                    $query->where('event', 'like', '%'.request('audit_events').'%');
                }

            })
            ->editColumn('old_values', function (Audit $audit) {
                $audit_old_values = json_decode($audit->old_values);

                if ($audit->old_values == "[]") {
                    return '';
                } else {
                    if ($audit->event == "updated" && isset($audit_old_values->password)){
                        $audit_old_values->password = __('global.modified');
                    } else {
                        unset($audit_old_values->password);
                    }
                    if ($audit->event == "updated" && isset($audit_old_values->remember_token)){
                        $audit_old_values->remember_token = __('global.modified');
                    } else {
                        unset($audit_old_values->remember_token);
                    }
                    if ($audit->event == "updated" && isset($audit_old_values->body)){
                        $audit_old_values->body = __('global.not_modified');
                    } else {
                        unset($audit_old_values->body);
                    }
                    $str = "";
                    foreach ($audit_old_values as $key => $value){
                        if ($value != null){
                            $str.= $key.": ". $audit_old_values->$key ."<br>";
                        }
                    }

                    return $str;
                }
            })
            ->editColumn('new_values', function (Audit $audit) {
                $audit_new_values = json_decode($audit->new_values);
                if ($audit->new_values == "[]") {
                    return '';
                } else {
                    if ($audit->event == "updated" && isset($audit_new_values->password)){
                        $audit_new_values->password = __('global.modified');
                    } else {
                        unset($audit_new_values->password);
                    }
                    if ($audit->event == "updated" && isset($audit_new_values->remember_token)){
                        $audit_new_values->remember_token = __('global.modified');
                    } else {
                        unset($audit_new_values->remember_token);
                    }
                    if ($audit->event == "updated" && isset($audit_new_values->body)){
                            $audit_new_values->body = __('global.modified');
                    } else {
                        unset($audit_new_values->body);
                    }
                    $str = "";
                    foreach ($audit_new_values as $key => $value){
                        if ($value != null){
                            $str.= $key.": ". $audit_new_values->$key ."<br>";
                        }

                    }

                    return $str;
                }
            })
            ->rawColumns(['old_values', 'new_values']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param Audit $model
     * @return Builder
     */
    public function query(Audit $model)
    {
        return $model->newQuery()
            ->select("audits.*", "users.name")
            ->from('audits')
            ->join('users', 'audits.user_id', '=', 'users.id');

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
                'filter' => false,
            ])
            ->postAjax([
                'url' => route('audit.index'),
                'data' => 'function(d) {
                    d.name = $("#name").val();
                    d.audit_events = $("#audit_events").val();
                    d.audit_models = $("#audit_models").val();
                }'
            ])
            ->setTableId('audit-table')
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
        return [
            Column::make("name")->title(__("global.user")),
            Column::make("event")->title(__("global.event")),
            Column::make("auditable_type")->title(__("global.model")),
            Column::make("id")->title(__("global.id")),
            Column::make("old_values")->title(__("global.old_values")),
            Column::make("new_values")->title(__("global.new_values")),
            Column::make("created_at")->title(__("global.date")),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Audit_' . date('YmdHis');
    }
}
