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

    public function oneEletro($id){

        $eletro = Eletros::find($id);

        if (!$eletro) {
            return response()->json(['message' => 'Product not found.'],404);
        }

        return response()->json($eletro);
    }

    public function editEletro(Request $request, $id){
        $eletro = Eletros::find($id);

        if (!$eletro) {
            return response()->json(['message' => 'Product not found.'],404);
        }

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

        $eletro->fill($request->except('id'));
        $eletro->save();

        return response()->json($eletro);
    }

    public function deleteEletro($id){

        $eletro = Eletros::find($id);

        if (!$eletro) {
            return response()->json(['message' => 'Product not found.'],404);
        }

        $eletro->delete();
        return response()->json([],204);
    }
}