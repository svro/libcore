<?php namespace Eduweb2\Libcore;

use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Klas;


class Richting extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'richting';

    public function klassen() {
        return $this->hasMany('Eduweb2\Libcore\Klas');
    }
}
