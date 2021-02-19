<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxpayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "emp_ruc" => $this->emp_ruc,
            "emp_descripcion" => $this->emp_descripcion,
            "emp_estado_con" => $this->emp_estado_con,
            "emp_con_domicilio" => $this->emp_con_domicilio,
            "emp_ubigeo" => $this->emp_ubigeo,
            "emp_tipo_via" => $this->emp_tipo_via,
            "emp_nombre_via" => $this->emp_nombre_via,
            "emp_codigo_zona" => $this->emp_codigo_zona,
            "emp_tipo_zona" => $this->emp_tipo_zona,
            "emp_numero" => $this->emp_numero,
            "emp_interior" => $this->emp_interior,
            "emp_lote" => $this->emp_lote,
            "emp_departamento" => $this->emp_departamento,
            "emp_manzana" => $this->emp_manzana,
            "emp_kilometro" => $this->emp_kilometro,
            "ultima_actualizacion" => $this->ultima_actualizacion,
        ];
    }
}
