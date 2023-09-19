<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filepaths;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\LogController;

class FilepathsController extends Controller
{
    public function fetchAllFilepaths()
    {
        $model = new Filepaths();
        return $model->getAll();
    }

    public function createFilepath(Request $request): RedirectResponse
    {
        $logController = new LogController();
        $model = new Filepaths();
        $model->validateFields($request);
        $filepath = $request->file('file')->storeAs('/', $request->file('file')->getClientOriginalName(), 'public');

        $model->store([
            'filepath' => Storage::url($filepath),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $logController->createLog('Adicionado novo arquivo de suporte', Storage::url($filepath));

        return redirect('/admin/home');
    }


    public function deleteFilepath($id): RedirectResponse
    {
        $logController = new LogController();

        $model = new Filepaths();
        $model->deleteFilepath($id);

        $logController->createLog('Excluído um arquivo de suporte', 'ID: '.$id);

        return redirect('/admin/home');
    }
}
