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
        foreach (Str::of($values)->explode(' ') as $value) {
            $query->orwhere('emp_ruc', 'like',  "%{$value}%")
                ->orwhere('emp_descripcion', 'like',  "%{$value}%");
        }
    }
}
