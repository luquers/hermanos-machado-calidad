<?php


namespace App\Traits;


use Illuminate\Support\Str;

trait FiltersDatatable {

    public function __construct() {

    }

    public function filterColumns($query, $typeSearch, $moduleName = null) {
        $filters = $this->getFilters($query, $moduleName);

        foreach ($filters as $columnName => $data) {
            if (request($columnName)) {
                $query->where($columnName, $data['operator'], $this->typeSearch(request($columnName), $typeSearch));
            }
        }


        return $query;
    }

    public function getFilters($query, $moduleName) {
        if ($moduleName) {
            $config = $moduleName;
        }
        else {
            $config = Str::lower(class_basename($query->getModel()));
        }

        return config($config . '.filterColumns');
    }

    public function typeSearch($column, $typeSearch) {

        $search = $column;

        switch ($typeSearch) {
            case 'complete':
                $search = '%'.$column.'%';
                break;
            case 'start':
                $search = '%'.$column;
                break;
            case 'end':
                $search = $column.'%';
                break;
        }

        return $search;
    }



}