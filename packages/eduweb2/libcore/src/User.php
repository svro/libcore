<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';

    public function leerling() {
        return $this->belongsTo('Eduweb2\Libcore\Leerling');
    }

    public function leerkracht() {
        return $this->belongsTo('Eduweb2\Libcore\Leerkracht');
    }

}
