<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

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
        ];
    }
    
    /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    /**
     * Check if the user has a specific role.
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->where('slug', $role)->count();
        }
        
        return !!$role->intersect($this->roles)->count();
    }
    
    /**
     * Get the plants created by the user.
     */
    public function plants()
    {
        return $this->hasMany(Plant::class, 'created_by');
    }
    
    /**
     * Get the plants approved by the user.
     */
    public function approvedPlants()
    {
        return $this->hasMany(Plant::class, 'approved_by');
    }
    
    /**
     * Get the queries created by the user.
     */
    public function queries()
    {
        return $this->hasMany(Query::class);
    }
    
    /**
     * Get the queries assigned to the user.
     */
    public function assignedQueries()
    {
        return $this->hasMany(Query::class, 'assigned_to');
    }
}
