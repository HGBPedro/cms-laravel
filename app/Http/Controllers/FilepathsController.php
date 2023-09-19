<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filepaths;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FilepathsController extends Controller
{
    public function fetchAllFilepaths()
    {
        $model = new Filepaths();
        return $model->getAll();
    }

    public function createFilepath(Request $request): RedirectResponse
    {
        $model = new Filepaths();
        $model->validateFields($request);
        $filepath = $request->file('file')->storeAs('/', $request->file('file')->getClientOriginalName(), 'public');

        $model->store([
            'filepath' => Storage::url($filepath),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/admin/home');
    }


    public function deleteFilepath($id): RedirectResponse
    {

        $model = new Filepaths();
        $model->deleteFilepath($id);

        return redirect('/admin/home');
    }
}
