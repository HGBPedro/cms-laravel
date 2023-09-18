<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filepaths;

class FilepathsController extends Controller
{
    public function fetchAllFilepaths()
    {
        $model = new Filepaths();
        return $model->getAll();
    }

    public function createFilepath(Request $request): RedirectResponse
    {
        $filepath = $request->file->store('/');
        $model = new Filepaths();

        $model->validateFields($requests);
        $model->store([
            'filepath' => $filepath,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/admin');
    }


    public function deleteFilepath($id): RedirectResponse
    {

        $model = newFilepaths();
        $model->delete($id);

        return redirect('/admin');
    }
}
