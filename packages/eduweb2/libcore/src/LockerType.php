<?php namespace Eduweb2\Libcore;


use Illuminate\Database\Eloquent\Model;
use Eduweb2\Libcore\Locker;


class LockerType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locker_type';

    public function lockers() {
        return $this->hasMany('Eduweb2\Libcore\Locker');
    }
}
