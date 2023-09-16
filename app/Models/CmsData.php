<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsData extends Model
{
    use HasFactory;

    public function update($data)
    {
        $cms_data = new self::find(1);
        $cms_data->fill($request);
        $cms_data->$save;

        return $cms_data;
    }

    public function fetchCmsData()
    {
        $cms_data = new self::find(1)
        return $cms_data;
    }

    public function validateFields($data)
    {
        return $data->([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'content' => 'required',
            'bg_image_path' => 'required'
        ]);
    }
}
