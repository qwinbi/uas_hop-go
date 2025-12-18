<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_code',
        'rental_id',
        'user_id',
        'amount',
        'method',
        'status',
        'proof_image',
        'payment_details',
        'paid_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_details' => 'array',
        'paid_at' => 'datetime',
    ];

    // Generate payment code
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($payment) {
            $payment->payment_code = 'PAY-' . strtoupper(uniqid());
        });
    }

    // Relationships
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor for proof image URL
    public function getProofImageUrlAttribute()
    {
        if ($this->proof_image) {
            return asset('storage/payments/' . $this->proof_image);
        }
        return null;
    }

    // Method to generate virtual account
    public function generateVirtualAccount()
    {
        $vaNumber = '988' . str_pad($this->id, 10, '0', STR_PAD_LEFT);
        $this->payment_details = [
            'virtual_account' => $vaNumber,
            'bank_name' => 'Virtual Bank',
            'expired_at' => now()->addHours(24)->toDateTimeString(),
        ];
        $this->save();
        return $vaNumber;
    }
}