<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        return Meeting::orderBy('scheduled_at')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'required|date',
        ]);

        $meeting = Meeting::create($validated);

        return response()->json($meeting, 201);
    }

    public function show(Meeting $meeting)
    {
        return $meeting;
    }

    public function update(Request $request, Meeting $meeting)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'scheduled_at' => 'sometimes|required|date',
        ]);

        $meeting->update($validated);

        return response()->json($meeting);
    }

    public function destroy(Meeting $meeting)
    {
        $meeting->delete();

        return response()->json(null, 204);
    }
}
