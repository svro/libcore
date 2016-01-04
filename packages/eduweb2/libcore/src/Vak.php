<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Lesopdracht;


class Vak extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vak';

    public function lesopdrachten() {
        return $this->hasMany('Eduweb2\Libcore\Lesopdracht');
    }
}
