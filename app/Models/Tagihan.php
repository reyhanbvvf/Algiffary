<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    public function permohonans()
    {
        return $this->belongsTo(Permohonan::class);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function save(array $options = [])
    {
        $this->total = $this->pembayarans()->sum('subtotal');

        return parent::save($options);
    }
}
