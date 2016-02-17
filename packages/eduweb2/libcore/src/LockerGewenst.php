<?php namespace Eduweb2\Libcore;


use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Locker;
use Eduweb2\Libcore\Leerling;

class LockerGewenst extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locker_gewenst';

    public function leerling() {
        return $this->belongsTo('Eduweb2\Libcore\Leerling');
    }
}
