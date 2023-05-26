<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['user', 'post'];
      /**
     * 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
    /**
     * Getting the post that owns a given comment.
     */
    public function post(): BelongsTo{
        return $this->belongsTo(Post::class);
    }
     /**
     * 
     */
    protected $fillable = [
        'body',
    ];
}
