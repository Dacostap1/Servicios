<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TaxPayer extends Model
{
    public  $allowedSorts = ['name', 'emp_ruc', 'emp_descripcion', 'emp_estado_con', 'emp_con_domicilio', 'ultima_actualizacion'];

    public function scopeSearch(Builder $query, $values)
    {
        $query->when(is_numeric($values), function ($query) use ($values) { //Si son numeros busca por ruc
            return $query->where('emp_ruc', 'like',  "%{$values}%");
        }, function ($query) use ($values) {
            return
                $query->where('emp_descripcion', 'like',  "%{$values}%");
        });
    }
}
