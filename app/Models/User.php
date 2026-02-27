<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'phone',
        'age',
        'bio',
        // 'password', // Commented out since we're not using auth in this demo
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        // 'password', // Commented out since we're not using it
        // 'remember_token',
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
            'age' => 'integer', // Cast age to integer
            // 'password' => 'hashed',
        ];
    }

    /**
     * Accessor for formatted phone number (optional)
     */
    public function getFormattedPhoneAttribute()
    {
        if (!$this->phone) {
            return null;
        }
        
        // Format: (XXX) XXX-XXXX for US numbers
        $cleaned = preg_replace('/[^0-9]/', '', $this->phone);
        if (strlen($cleaned) == 10) {
            return '(' . substr($cleaned, 0, 3) . ') ' . substr($cleaned, 3, 3) . '-' . substr($cleaned, 6, 4);
        }
        
        return $this->phone;
    }
}