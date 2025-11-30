<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveChannel extends Model
{
    use HasFactory;

    public function getYoutubeId()
    {
        // Menangkap ID dari URL Youtube (format apapun)
        preg_match('/(youtu\.be\/|v=)([^&]+)/', $this->video_id, $match);
        return $match[2] ?? $this->video_id;
    }
}
