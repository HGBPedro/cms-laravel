<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\CmsData;
use App\Models\Filepaths;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class CmsDataController extends Controller
{
    public function index ()
    {
        $cmsModel = new CmsData();
        $filepathsModel = new Filepaths();
        $filepaths = $filepathsModel->fetchAll();
        $cms = $cmsModel->fetchCmsData();
        $fileParts = explode('/', $cms['bg_image_path']);
        $fileName = array_pop($fileParts);
        $bgImage = Storage::url($fileName);

        return view('index')->with('cms', $cms)->with('bgImage', $bgImage)->with('filepaths', $filepaths);
    }

    public function updateMainData(Request $request): RedirectResponse
    {
        $filepath = $request->bgImage->store('public');
        $model = new CmsData();

        $model->validateFields($requests);
        $model->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'bg_image_path' => $filepath,
            'content' => $request->content
        ]);

        return redirect('/admin');
    }
}
