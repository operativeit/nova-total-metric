<?php

namespace EomPlus\NovaTotalMetric;
use Illuminate\Database\Eloquent\Builder;

trait HasTotal {


    public function component()
    {
        return 'nova-total-metric';
    }

    public function total($request, $model, $column = null) {
        $column = $column ?? 'id';
        $query = $model instanceof Builder ? $model : (new $model)->newQuery();
        return $this->result(
            with(clone $query)->count($column)
        );
    }

}

