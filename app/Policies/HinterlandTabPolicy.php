<?php

namespace App\Policies;

use App\Models\User;
use App\Models\HinterlandTab;

class HinterlandTabPolicy
{
    public function update(User $user, HinterlandTab $tab)
    {
        return $user->id === $tab->user_id && $user->region === $tab->region;
    }
    public function delete(User $user, HinterlandTab $tab)
    {
        return $user->id === $tab->user_id && $user->region === $tab->region;
    }
}
