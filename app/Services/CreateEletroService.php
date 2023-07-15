<?php

namespace App\Services;

use App\Models\Eletros;
use Illuminate\Support\Facades\Validator;

class CreateEletroService{

    public function execute(array $data){

        $validator = Validator::make($data, [
            'brand' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, Eletros::$brands)) {
                        $fail('The selected brand is not allowed. Only: LG, Samsung, Fischer, Brastemp, Electrolux.');
                    }
                }
            ],
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        return Eletros::create($data);
    }
}