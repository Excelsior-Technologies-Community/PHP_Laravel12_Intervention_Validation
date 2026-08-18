<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
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
        'phone',
        'age',
        'employment_status',
        'company_name',
        'bio',
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
            'age' => 'integer',
        ];
    }

    /**
     * Accessor for formatted phone number.
     */
    public function getFormattedPhoneAttribute()
    {
        if (!$this->phone) {
            return null;
        }

        $cleaned = preg_replace('/[^0-9]/', '', $this->phone);

        if (strlen($cleaned) === 10) {
            return '(' .
                substr($cleaned, 0, 3) .
                ') ' .
                substr($cleaned, 3, 3) .
                '-' .
                substr($cleaned, 6, 4);
        }

        return $this->phone;
    }
}