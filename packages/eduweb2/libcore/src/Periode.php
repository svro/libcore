<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\ToetsenLijst;

class Periode extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'periode';

    public function toetsenlijsten() {
        return $this->belongsToMany('Eduweb2\Libcore\Toetsenlijst', 'periode_toetsenlijst')->withTimestamps();
    }
}
