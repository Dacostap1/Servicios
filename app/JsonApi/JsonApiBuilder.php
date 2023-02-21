<?php

namespace App\JsonApi;

use Illuminate\Support\Str;

class JsonApiBuilder
{
    public function jsonPaginate()   //Las funciones de los mixins siempre retornan una funcion anonima
    {
        return function () {
            return $this->paginate(
                $perPage = request('itemsPerPage'),
                $columns = ['*'],
                $pageName = 'page',
                $page =  request('page'),
            )->appends(request()->except('page'));
        };
    }

    public function applySorts()   //Las funciones de los mixins siempre retornan una funcion anonima
    {
        return function () {
            if (!property_exists($this->model, 'allowedSorts')) { //this hace referencia al query builder
                abort(500, 'Agrega la propiedad publica allowedSorts al modelo ' . get_class($this->model));
            }

            if (is_null(request('sort'))) { //Si no hay parametros no se altera el query builder
                return $this;
            }

            $sortFields = Str::of(request('sort'))->explode(',');

            foreach ($sortFields as $sortField) {
                $order = 'asc';
                if (Str::of($sortField)->startsWith('-')) {
                    $order = 'desc';
                    $sortField = Str::of($sortField)->substr(1);
                }

                if (!collect($this->model->allowedSorts)->contains($sortField)) {
                    abort(400, "El parametro {$sortField} es invalido");
                }

                $this->orderBy($sortField, $order);
            }

            return $this;
        };
    }

    //Las funciones de los mixins siempre retornan una funcion anonima
    public function applyFilters()   
    {
        return function () {

            //obtenermos los valores del request si tiene el scope filtramos
            foreach (request()->all() as $filter => $value) { 
         
                $scope = "scope" . ucfirst($filter);
       
                //validamos que exista el scope en el modelo
                if (method_exists($this->model, $scope)) {  
                   $this->{$filter}($value); //Busca scope en el modelo
                }
            }

            return $this;
        };
    }
}
