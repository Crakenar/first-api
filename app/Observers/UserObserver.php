<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
        $this->hashPassword($user);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }

    protected function hashPassword(User $user): void
    {
        if (isset($user->password) && Hash::needsRehash($user->password)){
            $user->update([
               'password' => Hash::make($user->password)
            ]);
        }
    }
}
