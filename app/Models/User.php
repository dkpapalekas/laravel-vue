<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeId(Builder $q, $x) {
        $type = gettype($x);
        switch ($type) {
            case 'integer':
            case 'string':
                return $q->where('id', '=', $x);
            case 'array':
                return $q->whereIn('id', $x);
            case 'object':
                if (is_iterable($x))
                    return $q->whereIn('id', iterator_to_array($x));
            default:
                throw new \Exception('Error in User::scopeId: expected int|string|array, got ' . $type);
        }
    }
}
