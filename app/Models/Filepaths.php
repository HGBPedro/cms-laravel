<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filepaths extends Model
{
    use HasFactory;

    public function fetchAll()
    {
        $filepath = new self;
        return $filepath->all();
    }

    public function store($data)
    {
        $filepath = new self;

        $filepath->fill($data);

        return $filepath;
    }

    public function deleteFilepath($id)
    {
        $deleted = self::where('id', $id)->delete();
        return $deleted;
    }

    public function validateFields($data)
    {
        return $data->validate([
            'file' => 'required'
        ]);
    }
}
