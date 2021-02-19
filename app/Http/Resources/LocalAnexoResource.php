<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalAnexoResource extends JsonResource
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
            "loc_ruc" => $this->loc_ruc,
            "loc_ubigeo" => $this->loc_ubigeo,
            "loc_tipo_via" => $this->loc_tipo_via,
            "loc_nombre_via" => $this->loc_nombre_via,
            "loc_codigo_zona" => $this->loc_codigo_zona,
            "loc_tipo_zona" => $this->loc_tipo_zona,
            "loc_numero" => $this->loc_numero,
            "loc_kilometro" => $this->loc_kilometro,
            "loc_interior" => $this->loc_interior,
            "loc_lote" => $this->loc_lote,
            "loc_departamento" => $this->loc_departamento,
            "loc_manzana" => $this->loc_manzana,
            "ultima_actualizacion" => $this->ultima_actualizacion,
        ];
    }
}
