<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\CmsData;
use Illuminate\Support\Facades\Storage;

class CmsDataController extends Controller
{
    public function updateMainData(Request $request): RedirectResponse
    {
        $filepath = $request->bgImage->store('/');
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
