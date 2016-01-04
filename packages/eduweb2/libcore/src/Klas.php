<?php namespace Eduweb2\Libcore;


use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Richting;
use Eduweb2\Libcore\Leerling;

class Klas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'klas';

    public function richting() {
        return $this->belongsTo('Eduweb2\Libcore\Richting');
    }

    public function lesopdrachten() {
        return $this->hasMany('Eduweb2\Libcore\Lesopdracht');
    }

    public function leerlingen() {
        return $this->hasMany('Eduweb2\Libcore\Leerling');
    }
}
