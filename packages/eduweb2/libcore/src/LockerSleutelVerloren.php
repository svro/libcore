<?php namespace Eduweb2\Libcore;


use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\Leerling;

class LockerSleutelVerloren extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locker_sleutel_verloren';

    public function locker() {
        return $this->belongsTo('Eduweb2\Libcore\Locker');
    }

    public function leerling() {
        return $this->belongsTo('Eduweb2\Libcore\Leerling');
    }
}
