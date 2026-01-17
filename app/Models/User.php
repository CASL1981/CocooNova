<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Mattiverse\Userstamps\Traits\Userstamps;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    use HasRoles;
    use Userstamps;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['identification', 'name', 'lastname', 'area', 'email', 'status', 'role_id', 'destination', 'password', 'profile_photo_path'];

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
     * Get the user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name.' '.$this->lastname;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m:s',
        'updated_at' => 'datetime:d-m-Y h:m:s',
    ];

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryTable($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select(['id', 'identification', 'name', 'lastname', 'email', 'area', 'status', 'role_id', 'destination', 'profile_photo_path'])
            ->search('identification', $keyWord)
            ->search('name', $keyWord)
            ->search('lastname', $keyWord)
            ->search('email', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|null  $keyWord
     * @param  string  $sortField
     * @param  string  $sortDirection
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function QueryExport($keyWord, $sortField, $sortDirection): mixed
    {
        return $this->select(['identification', 'name', 'lastname', 'email', 'status', 'destination'])
            ->search('identification', $keyWord)
            ->search('name', $keyWord)
            ->search('lastname', $keyWord)
            ->search('email', $keyWord)
            ->orderBy($sortField, $sortDirection);
    }
}
