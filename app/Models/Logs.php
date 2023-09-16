<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    public function store($data)
    {
        $log = new self;

        $log->fill($data);
        $log->save();

        return $log;
    }

    public function getAll()
    {
        return self::getAll();
    }
}
