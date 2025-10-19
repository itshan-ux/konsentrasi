<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentiment_232187 extends Model
{
    protected $table = 'sentiments_232187';
    protected $primaryKey = 'id_232187';

    protected $fillable = [
        'post_id_232187', 'sentiment_label_232187', 'sentiment_score_232187', 'analyzed_at_232187'
    ];

    public function post()
    {
        return $this->belongsTo(Post_232187::class, 'post_id_232187');
    }
}

