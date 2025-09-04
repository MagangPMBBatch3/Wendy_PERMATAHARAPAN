<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Get the user's profile.
     */
    public function userProfile()
    {
        return $this->hasOne(\App\Models\UserProfile\UserProfile::class, 'user_id');
    }

    /**
     * Check if the user has access to a given permission.
     * For now, this is a stub that returns true for all permissions.
     * You can extend this method to implement real permission checks.
     *
     * @param string $permission
     * @return bool
     */
    public function canAccess(string $permission): bool
    {
        // TODO: Implement real permission logic here
        return true;
    }
}
