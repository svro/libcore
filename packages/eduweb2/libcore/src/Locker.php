<?php namespace Eduweb2\Libcore;


use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\LockerType;
use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\LockerSleutelVerloren;

class Locker extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locker';

    public function lockerType() {
        return $this->belongsTo('Eduweb2\Libcore\LockerType');
    }

    public function leerling() {
        return $this->belongsTo('Eduweb2\Libcore\Leerling');
    }

    public function lockerSleutelVerloren() {
        return $this->hasMany('Eduweb2\Libcore\LockerSleutelVerloren');
    }


}
