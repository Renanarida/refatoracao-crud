<?php


namespace App\Policies;


use App\Models\Meeting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class MeetingPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user): bool
    {
        return true;
    }


    public function view(User $user, Meeting $meeting): bool
    {
        return true;
    }


    public function create(User $user): bool
    {
        return true; // Ajuste se necessário
    }


    public function update(User $user, Meeting $meeting): bool
    {
        return $user->id === $meeting->organizer_id;
    }


    public function delete(User $user, Meeting $meeting): bool
    {
        return $user->id === $meeting->organizer_id;
    }
}
