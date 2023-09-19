<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\CmsData;
use App\Models\Filepaths;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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

    public function indexManagement ()
    {
        if (!Auth::check()) return view('login');

        $cmsModel = new CmsData();
        $filepathsModel = new Filepaths();
        $filepaths = $filepathsModel->fetchAll();
        $cms = $cmsModel->fetchCmsData();
        $fileParts = explode('/', $cms['bg_image_path']);
        $fileName = array_pop($fileParts);
        $bgImage = Storage::url($fileName);

        return view('adminHome')->with('cms', $cms)->with('bgImage', $bgImage)->with('filepaths', $filepaths);
    }

    public function updateMainData(Request $request): RedirectResponse
    {
        $model = new CmsData();
        if ($request->hasFile('bgImage')) {
            $filepath = $request->file('bgImage')->storeAs('/', $request->file('bgImage')->getClientOriginalName(), 'public');
        } else {
            $ogItem = $model->fetchCmsData();
            $fileParts = explode('/', $ogItem['bg_image_path']);
            $filepath = array_pop($fileParts);
        }

        $model->validateFields($request);
        $model->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'bg_image_path' => Storage::url($filepath),
            'content' => $request->content
        ]);

        return redirect('/admin/home');
    }
}
