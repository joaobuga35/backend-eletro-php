<?php 

namespace App\Http\Controllers;

use App\Models\Eletros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EletroController extends Controller{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brand' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, Eletros::$brands)) {
                        $fail('A marca selecionada não é permitida. Apenas: LG, Samsung, Fischer, Brastemp, Electrolux.');
                    }
                }
            ],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        return Eletros::create($request -> all());
    }

    public function allEletros(){

        $eletros = Eletros::all();

        return response()->json($eletros);
    }
}