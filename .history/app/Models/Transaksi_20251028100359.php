<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MenuKopi;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'menu_id',
        'nama_pemesan',
        'nohp_pemesan',
        'tanggal_pesan',
        'waktu_pesan',
    ];

    public function menu()
    {
        return $this->belongsTo(MenuKopi::class, 'menu_id');
    }
}
