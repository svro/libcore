<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;

use Eduweb2\Libcore\Toetsenlijst;

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
}
