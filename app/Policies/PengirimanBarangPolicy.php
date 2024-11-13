<?php

namespace App\Policies;

use App\Models\PengirimanBarang;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PengirimanBarangPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PengirimanBarang $pengirimanBarang): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        Log::info('User role_id: ' . $user->role_id); 
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PengirimanBarang $pengirimanBarang): bool
    {
        return $user->role_id === 1;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PengirimanBarang $pengirimanBarang): bool
    {
        return $user->role_id === 1;
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PengirimanBarang $pengirimanBarang): bool
    {
        return false; 
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PengirimanBarang $pengirimanBarang): bool
    {
        return false; 
    }
}
