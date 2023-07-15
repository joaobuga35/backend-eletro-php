<?php

namespace App\Services;

use App\Exceptions\AppError;
use App\Models\Eletros;

class CreateEletroService{

    public function execute(array $data){
        
        $checkBrand = in_array($data['brand'], Eletros::$brands);
 
        if (!$checkBrand) {
            throw new AppError('The selected brand is not allowed. Only: LG, Samsung, Fischer, Brastemp, Electrolux.', 400);
        }
    
        return Eletros::create($data);
    }
}