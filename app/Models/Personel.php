<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

class Personel extends Authenticatable
{
    use HasFactory;

    protected $table = 'personel';
    protected $primaryKey = 'nrp';
    public $incrementing = false;        // karena PK string (NRP)
    protected $keyType = 'string';

    protected $fillable = [
        'nrp',
        'nrp_',
        'password',
        'name',
        'pangkat',
        'golongan',
        'jabatan',
        'role',
        'satker_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'satker_id' => 'integer',
    ];

    // Auto-hash password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    // Relasi ke Satker
    public function satker(): BelongsTo
    {
        return $this->belongsTo(Satker::class, 'satker_id', 'kode_satker');
    }

    public function pengajuanIzin(): HasMany
    {
        return $this->hasMany(PengajuanIzin::class, 'personel_id', 'nrp');
    }

        public function pengajuanCuti(): HasMany
    {
        return $this->hasMany(PengajuanCuti::class, 'personel_id', 'nrp');
    }
}