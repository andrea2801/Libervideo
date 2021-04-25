<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Book extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'description',
        'isbn',
        'user_id',
        'api_token'];

    function author()
    {
        return $this->belongsTo(User::class);
    }
}
