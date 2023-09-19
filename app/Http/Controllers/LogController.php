<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;

class LogController extends Controller
{
    public function createLog(string $change, string $newValue)
    {
        $userId = auth()->user()->id;

        $logData = [
            'change' => $change,
            'user_id' => $userId,
            'value' => $newValue,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $model = new Logs();
        return $model->createNewLog($logData);
    }
}
