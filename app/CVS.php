<?php

namespace app;

/*
 * Antvel - Users Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Eloquent\Model;
use App\Log;
use App\Notifications\Auth\ResetPasswordNotification;
use App\Order;
use App\UserPoints;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class CVS extends Model
{
    protected $table = 'jianli';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * The attribute for soft deletes.
     *
     * @var [type]
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


}
