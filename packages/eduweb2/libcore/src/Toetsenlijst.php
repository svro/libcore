<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijsttype;
use Eduweb2\Libcore\Lesopdracht;
use Eduweb2\Libcore\Periode;
use Eduweb2\Libcore\Toets;


class Toetsenlijst extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'toetsenlijst';

    public function toetsenlijsttypes() {
        return $this->hasMany('Eduweb2\Libcore\Toetsenlijsttype');
    }

    public function lesopdracht() {
        return $this->belongsTo('Eduweb2\Libcore\Lesopdracht');
    }

    public function periodes() {
        return $this->belongsToMany('Eduweb2\Libcore\Periode', 'periode_toetsenlijst')->withTimestamps();
    }

    public function toetsen() {
        return $this->hasMany('Eduweb2\Libcore\Toets');
    }
}
