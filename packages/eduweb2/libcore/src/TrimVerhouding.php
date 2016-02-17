<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toets;
use Eduweb2\Libcore\Leerling;

class Cijfer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cijfer';

    public function richting() {
        return $this->belongsTo('Eduweb2\Libcore\Richting');
    }

    public function toetsenlijsttype() {
        return $this->belongsTo('Eduweb2\Libcore\Toetsenlijsttype');
    }
}
