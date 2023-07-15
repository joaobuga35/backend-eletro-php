<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Eletros;

class DeleteEletroService{
    public function destroyEletro($id)
    {
        $eletro = Eletros::find($id);

        if (!$eletro) {
            throw new AppError("Product not found.", 404);
        }

        $eletro->delete();
    }
}