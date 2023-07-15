<?php 

namespace App\Services; 

use App\Exceptions\AppError;
use App\Models\Eletros;

class EditEletroService{

    public function execute(array $data, string $id)
    {   
        $eletro = Eletros::find($id);

        if (!$eletro) {
            throw new AppError("Product not found.", 404);
        }

        $checkBrand = in_array($data['brand'], Eletros::$brands);
 
        if (!$checkBrand) {
            throw new AppError('The selected brand is not allowed. Only: LG, Samsung, Fischer, Brastemp, Electrolux.', 400);
        }

        $eletro->fill($data);
        $eletro->save();
    
        return $eletro;
    }
}