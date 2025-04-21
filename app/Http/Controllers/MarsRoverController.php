<?php

namespace App\Http\Controllers;

use App\Models\MissionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MarsRoverController extends Controller
{
    public function home()
    {
        $user = Auth::user();

        return Inertia::render("Home", [
            'name' => $user->name,
            'missionLogs' => MissionLog::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->get()
                ->map(function ($log) {
                    return [
                        'time' => $log->created_at->format('H:i'),
                        'message' => $log->message,
                        'details' => $log->details,
                        'type' => $log->type,
                    ];
                })
        ]);
    }

    public function update_logs(Request $request)
    {
        try {
            $validated = $request->validate([
                'message' => 'required|string|max:255',
                'details' => 'required|string',
            ]);

            $user = Auth::user();

            if (!$user) {
                return Inertia::render('Error', [
                    'message' => 'Unauthenticated. Please log in.'
                ]);
            }

            $log = MissionLog::create([
                'user_id' => $user->id,
                'message' => $validated['message'],
                'details' => $validated['details'],
                'type' => 'INFO',
            ]);

            return Inertia::render('Dashboard', [
                'flash' => [
                    'success' => 'Log entry created successfully',
                ],
                'newLog' => $log
            ]);
        } catch (\Exception $e) {
            return Inertia::render('Error', [
                'message' => 'Failed to create log entry',
                'error' => $e->getMessage()
            ]);
        }
    }
}
