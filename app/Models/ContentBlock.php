<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    protected $fillable = ['title', 'content'];

    public function blockable()
    {
        return $this->morphTo();
    }
}
