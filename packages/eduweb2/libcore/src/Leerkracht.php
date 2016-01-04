<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\User;
use Eduweb2\Libcore\Lesopdracht;


class Leerkracht extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leerkracht';

    public function user() {
        return $this->hasOne('Eduweb2\Libcore\User');
    }

    public function lesopdrachten() {
        return $this->belongsToMany('Eduweb2\Libcore\Lesopdracht', 'leerkracht_lesopdracht');
    }
}
