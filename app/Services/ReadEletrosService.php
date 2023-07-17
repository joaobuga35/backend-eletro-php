<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Eletros;

class ReadEletrosService{
    public function readAll()
    {
        $allEletros = Eletros::all();
        return $allEletros;
    }

    public function readOne(string $id)
    {
        $oneEletro = Eletros::find($id);

        if (!$oneEletro) {
            throw new AppError('Product not found.',404);
        }

        return $oneEletro;
    }
}