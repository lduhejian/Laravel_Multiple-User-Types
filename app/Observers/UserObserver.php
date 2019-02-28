<?php 

namespace App\Observers;

use App\User;

class UserObserver {
    
    public function retrieved(User $user) {
        foreach ($user->typeable->toArray() as $key => $value) {
            $user->setAttribute($key, $value);
        }
    }
}