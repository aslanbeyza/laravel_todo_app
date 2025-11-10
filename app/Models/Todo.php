<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'status',
        'priority',
        'due_date',
        'completed_at',
        'is_starred'
    ];
    //Şimdi de bu modelin içine relationleri ekleyelim
    public function user():BelongsTo //BlongsTo ile tip olarak daha güvenli hale getiririz
    {
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }



}
