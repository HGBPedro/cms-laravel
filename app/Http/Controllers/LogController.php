<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logs;
use App\Jobs\SendLogEmail;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index () {
        if (!Auth::check()) return view('login');
        $model = new Logs();

        $logs = $model->getAll();

        return view('logs')->with('logs', $logs);
    }
    public function createLog(string $change, string $newValue)
    {
        $user = auth()->user();

        $logData = [
            'change' => $change,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'value' => $newValue,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $model = new Logs();
        SendLogEmail::dispatch($logData);
        return $model->createNewLog($logData);
    }
}
