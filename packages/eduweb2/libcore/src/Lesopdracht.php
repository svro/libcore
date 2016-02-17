<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Vak;
use Eduweb2\Libcore\Klas;
use Eduweb2\Libcore\Leerkracht;
use Eduweb2\Libcore\Toetsenlijst;

class Lesopdracht extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lesopdracht';

    public function vak() {
        return $this->belongsTo('Eduweb2\Libcore\Vak');
    }

    public function klas() {
        return $this->belongsTo('Eduweb2\Libcore\Klas');
    }

    public function leerkrachten() {
        return $this->belongsToMany('Eduweb2\Libcore\Leerkracht', 'leerkracht_lesopdracht')->withTimestamps();
    }

    public function toetsenlijsten() {
        return $this->hasMany('Eduweb2\Libcore\Toetsenlijst');
    }
}
