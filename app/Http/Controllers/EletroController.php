<?php 

namespace App\Http\Controllers;

use App\Http\Requests\CreateEletroRequest;
use App\Http\Requests\UpdateEletroRequest;
use App\Services\CreateEletroService;
use App\Services\DeleteEletroService;
use App\Services\EditEletroService;
use App\Services\ReadEletrosService;


class EletroController extends Controller{
    public function create(CreateEletroRequest $request)
    {
        $createEletroService = new CreateEletroService();

        return $createEletroService->execute($request->all());
    }

    public function allEletros()
    {   
        $readAllEletrosService = new ReadEletrosService();

        $response = $readAllEletrosService->readAll();

        return response()->json($response);
    }

    public function oneEletro(string $id)
    {   
        $readOneEletroService = new ReadEletrosService();

        $response = $readOneEletroService->readOne($id);

        return response()->json($response);
    }

    public function editEletro(UpdateEletroRequest $request, string $id)
    {   
        $data = $request->validated();

        $editEletro = new EditEletroService();

        $response = $editEletro->execute($data, $id);

        return response()->json($response);
    }

    public function deleteEletro($id)
    {
        $deleteEletroService = new DeleteEletroService();

        $deleteEletroService->destroyEletro($id);

        return response()->json([],204);
    }
}