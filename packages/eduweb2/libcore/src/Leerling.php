<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\User;
use Eduweb2\Libcore\Klas;
use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\LockerGewenst;
use Eduweb2\Libcore\LockerSleutelVerloren;

class Leerling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leerling';

    public function user() {
        return $this->belongsTo('Eduweb2\Libcore\User');
    }

    public function klas() {
        return $this->belongsTo('Eduweb2\Libcore\Klas');
    }

    public function lockers() {
        return $this->hasMany('Eduweb2\Libcore\Locker');
    }

    public function lockerSleutelsVerloren() {
        return $this->hasMany('Eduweb2\Libcore\LockerSleutelVerloren');
    }

    public function lockerGewenst() {
        return $this->hasOne('Eduweb2\Libcore\LockerGewenst');
    }

}
