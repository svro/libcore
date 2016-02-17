<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijst;
use Eduweb2\Libcore\Cijfer;

class Toets extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'toets';

    public function toetsenlijst() {
        return $this->belongsTo('Eduweb2\Libcore\Toetsenlijst');
    }

    public function cijfers() {
        return $this->hasMany('Eduweb2\Libcore\Cijfer');
    }
}
