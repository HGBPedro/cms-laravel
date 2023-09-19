<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsData extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'bg_image_path', 'content'];

    public function update(array $attributes = [], array $options = [])
    {
        $model = new self;
        $cms_data = $model->find(1);
        $cms_data->fill($attributes);
        $cms_data->save();

        return $cms_data;
    }

    public function fetchCmsData()
    {
        $model = new self;
        $cms_data = $model->first();
        return $cms_data->attributes;
    }

    public function validateFields($data)
    {
        return $data->validate([
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'content' => 'required',
        ]);
    }
}
