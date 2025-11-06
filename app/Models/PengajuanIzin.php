<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengajuanIzin extends Model
{
    protected $table = 'pengajuanizin';

    protected $fillable = [
        'personel_id',
        'remin_id',
        'pimpinan_id',
        'keperluan',
        'pengikut',
        'pergi_dari',
        'tujuan',
        'tgl_berangkat',
        'tgl_kembali',
        'transportasi',
        'catatan',
        'namaFile_bukti',
        'pathFile_bukti',
        'status',
    ];

    protected $casts = [
        'tgl_berangkat' => 'date',
        'tgl_kembali'   => 'date',
    ];

    // Relasi belongsTo
    public function personel(): BelongsTo
    {
        return $this->belongsTo(Personel::class, 'personel_id', 'nrp');
    }

    public function remin(): BelongsTo
    {
        return $this->belongsTo(Remin::class, 'remin_id', 'kode_remin');
    }

    public function pimpinan(): BelongsTo
    {
        return $this->belongsTo(Pimpinan::class, 'pimpinan_id', 'kode_pimpinan');
    }
}