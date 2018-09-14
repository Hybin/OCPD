<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

	/**
	 * index
	 * Check if the current user is the Super Administrator
	 *
	 * @param User $currentUser
	 * @param User $admin
	 */
	public function index(User $currentUser, User $admin)
	{
		return $currentUser->position === $admin->position;
	}

	public function dashboard(User $currentUser, User $editor)
	{
		return $currentUser->editable === $editor->editable;
	}
	
}
