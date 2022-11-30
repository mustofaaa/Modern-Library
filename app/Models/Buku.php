<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;
    protected $table = "buku";
    protected $guarded = ['id'];
    /**
     * Get the kategori that owns the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
