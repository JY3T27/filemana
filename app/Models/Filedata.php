<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filedata extends Model
{
    protected $table = 'filedatas';

    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
