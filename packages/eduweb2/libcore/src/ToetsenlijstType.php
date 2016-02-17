<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijst;

class Toetsenlijsttype extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'toetsenlijsttype';

    public function toetsenlijsten() {
        return $this->hasMany('Eduweb2\Libcore\Toetsenlijst');
    }
}
