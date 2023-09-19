<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\CmsData;
use App\Models\Filepaths;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LogController;

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
        $ogItem = $model->fetchCmsData();
        if ($request->hasFile('bgImage')) {
            $filepath = $request->file('bgImage')->storeAs('/', $request->file('bgImage')->getClientOriginalName(), 'public');
        } else {
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

        self::createLogs($request, $ogItem);

        return redirect('/admin/home');
    }

    public function createLogs (Request $request, $ogItem)
    {
        $logController = new LogController();

        if (strcmp($request->title, $ogItem['title']) != 0) {
            $logController->createLog('Título alterado', $request->title);
        }

        if (strcmp($request->subtitle, $ogItem['subtitle']) != 0) {
            $logController->createLog('Subtítulo alterado', $request->subtitle);
        }

        if (strcmp($request->content, $ogItem['content']) != 0) {
            $logController->createLog('Conteúdo alterado', $request->content);
        }

        if ($request->hasFile('bgImage')) {
            $logController->createLog('Imagem de fundo alterada', Storage::url($ogItem['bg_image_path']));
        }

        return;
    }
}
