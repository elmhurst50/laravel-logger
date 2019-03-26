<?php namespace SamJoyce777\LaravelLogger\Models;

use Global4Communications\CrmCore\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';

    protected $guarded = ['id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
