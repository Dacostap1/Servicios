<?php

namespace App\Http\Controllers\AnnexedLocal;

use App\AnnexedLocal;
use App\Http\Controllers\ApiController;
use App\Http\Resources\LocalAnexoResource;

class AnnexedLocalController extends ApiController
{
    public function show($cadena)
    {
        $tax_payer = AnnexedLocal::where('loc_ruc', $cadena)->get();
        return LocalAnexoResource::collection($tax_payer);
    }
}
