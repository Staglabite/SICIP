<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Hash;

class Pimpinan extends Authenticatable
{
    use HasFactory;

    protected $table = 'pimpinan';
    protected $primaryKey = 'kode_pimpinan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kode_pimpinan',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'kode_pimpinan' => 'integer',
    ];

    // Auto-hash password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Relasi: satu Pimpinan punya banyak Satker
    public function satker(): HasMany
    {
        return $this->hasMany(Satker::class, 'kode_pimpinan', 'kode_pimpinan');
    }

    public function pengajuanIzin(): HasMany
    {
        return $this->hasMany(PengajuanIzin::class, 'pimpinan_id', 'kode_pimpinan');
    }

        public function pengajuanCuti(): HasMany
    {
        return $this->hasMany(PengajuanCuti::class, 'pimpinan_id', 'kode_pimpinan');
    }
}