<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Meeting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class MeetingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }


    public function index(Request $request): JsonResponse
    {
        $query = Meeting::query()->orderBy('start_time', 'desc');


        if ($request->has('upcoming')) {
            $query->where('start_time', '>=', now());
        }


        $meetings = $query->paginate(15);
        return response()->json($meetings);
    }


    public function store(StoreMeetingRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['organizer_id'] = $request->user()?->id ?? null;


        $meeting = Meeting::create($data);


        return response()->json($meeting, 201);
    }


    public function show(Meeting $meeting): JsonResponse
    {
        return response()->json($meeting);
    }


    public function update(UpdateMeetingRequest $request, Meeting $meeting): JsonResponse
    {
        $this->authorize('update', $meeting);


        $meeting->update($request->validated());
        return response()->json($meeting);
    }


    public function destroy(Meeting $meeting): JsonResponse
    {
        $this->authorize('delete', $meeting);
        $meeting->delete();
        return response()->json(null, 204);
    }
}
