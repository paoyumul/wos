<?php

namespace App\Policies;

use App\Models\Record;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecordPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @param string $ability
     *
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if ($user->isAdministrator() || $user->isAssistant()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Record $record
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Record $record)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Record $record
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Record $record)
    {
        return $user->id === $record->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Record $record
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Record $record)
    {
        return $user->id === $record->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Record $record
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Record $record)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Record $record
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Record $record)
    {
        //
    }
}
