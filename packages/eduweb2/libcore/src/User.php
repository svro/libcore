<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Leerling;
use Eduweb2\Libcore\Leerkracht;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    public function leerling() {
        return $this->hasMany('Eduweb2\Libcore\Leerling');
    }

    public function leerkracht() {
        return $this->belongsTo('Eduweb2\Libcore\Leerkracht');
    }

}
