<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filepaths extends Model
{
    use HasFactory;

    public function fetchAll()
    {
        return self::getAll();
    }

    public function store($data)
    {
        $filepath = new self;

        $filepath->fill($data);

        return $filepath;
    }

    public funciton delete($id)
    {
        $deleted = self::where('id', $id)->delete();
        return $deleted;
    }

    public function validateFields($data)
    {
        return $data->([
            'file' => 'required'
        ]);
    }
}
