<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\User;
use Eduweb2\Libcore\Klas;

class Leerling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leerling';

    public function user() {
        return $this->hasOne('Eduweb2\Libcore\User');
    }

    public function klas() {
        return $this->belongsTo('Eduweb2\Libcore\Klas');
    }

}
