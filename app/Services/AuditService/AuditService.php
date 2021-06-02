<?php

namespace App\Services\AuditService;

use App\Models\Audit;
use App\Repositories\AuditRepo\AuditRepo;
use Illuminate\View\View;
use App\DataTables\AuditDataTable;

class AuditService
{

    protected $auditRepo;

    public function __construct(AuditRepo $audit) {
        $this->auditRepo = $audit;
    }

    /**
     * Muestra un listado de una entidad
     *
     * @param AuditDataTable $auditDataTable
     * @return View
     */
    public function index(AuditDataTable $auditDataTable)
    {
        $breadcrumbs = [
            ['link' => config('app.url'), 'name' => __('menu.home')],
            ['link' => route('audit.index'), 'name' => __('menu.audits')]
        ];
        $eventselect=[
            [
                'name'=> __('global.default_select'),
                'id' => '%'
            ],
            [
                'name'=> __('global.created'),
                'id' => 'created'
            ],
            [
                'name'=> __('global.deleted'),
                'id' => 'deleted'
            ],
            [
                'name'=> __('global.updated'),
                'id' => 'updated'
            ],
            [
                'name'=> __('global.restored'),
                'id' => 'restored'
            ]
        ];
        $modelselect=[
            [
                'name'=> __('global.default_select'),
                'id' => '%'
            ],
            [
                'name'=> __('global.chapter'),
                'id' => 'Chapter'
            ],
            [
                'name'=> __('global.procedure'),
                'id' => 'Procedure'
            ],
            [
                'name'=> __('global.document'),
                'id' => 'Document'
            ],
            [
                'name'=> __('global.version'),
                'id' => 'version'
            ],
            [
                'name'=> __('global.user'),
                'id' => 'User'
            ],
        ];
        return $auditDataTable->render('project.audit.index', compact('breadcrumbs', 'eventselect', 'modelselect'));
    }




    /**
     * Muestra una entidad específica
     *
     * @param  Audit $audit
     * @return View
     */
    public function show(Audit $audit)
    {
        return view('audit.show', compact('audit'));
    }



}