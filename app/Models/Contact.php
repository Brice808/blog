<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Events\ModelCreated;

class Contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'message', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    protected $dispatchesEvents = [
        'created' => ModelCreated::class,
    ];
}
