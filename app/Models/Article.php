<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];
    protected $guarded = ['id'];

    public function getTitleContentAttribute(){
        return "{$this->title}{$this->content}";
    }

    public function setTitleContentAttribute($title, $content){
        $this->title = $title;
        $this->content = $content;
        $this->save();

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
