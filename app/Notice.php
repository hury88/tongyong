<?php

namespace app;

/*
 * Antvel - Notice Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Eloquent\Collection;
use App\Eloquent\Model;
use App\ActionType;

class Notice extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notices';

    protected $fillable = ['user_id', 'sender_id', 'action_type_id', 'source_id', 'status'];

    protected $appends = [];

    /**
     * Notices type array list
     * this array is controlling kind of notice shown in the store, so any other value that is not here can not be shown who notice
     * to know more about these id you must go to the action_types migration.
     *
     * @var [array]
     */
    protected $actionsType = [1, 2, 3, 8, 9, 10, 11, 14, 15];

    // protected $hidden = [ 'action', 'source' ];

    /**
     * Create one or more notices.
     * If user and sender are the same, this notices will be ignored.
     *
     * @param array $attr attributes
     *
     * @return Model|Collection element(s) created
     *
     * optional:
     * @attribute users : array with 2 users, notice to both users, sender and receiver
     * @attribute user_ids : send a notice from sender to all that user receivers
     */
    public static function create(array $attr = [])
    {
        $ac = ActionType::find($attr['action_type_id']);
        if (!isset($attr['title'])) {
            $attr['title'] = ActionType::find($attr['action_type_id'])->notice_title;
        }
        if (strpos($attr['user_id'], ',')) {
            $user_id_set = explode(',', $attr['user_id']);
            $user_id_set = array_unique($user_id_set);
            foreach ($user_id_set as $user_id) {
                $attr['user_id'] = $user_id;
                self::insert($attr);
            }
            return true;
        }
        return self::insert($attr);
        // parent::create($attr);
    }

    /**
     * create many notices.
     * If user and sender are the same, this notices will be ignored.
     *
     * @param array $notices [description]
     *
     * @return [type] [description]
     */
    public static function createMany(array $notices)
    {
        $valids = [];
        foreach ($notices as $notice) {
            if ($notice['user_id'] != $notice['sender_id']) {
                $valids[] = $notice;
            }
        }

        return parent::createMany($valids);
    }

    public function getActionAttribute()
    {
        return $this->hasOne('App\ActionType', 'id', 'action_type_id')->first()->useAs('notice');
    }

    public function getUserAttribute()
    {
        return $this->hasOne('App\User', 'id', 'user_id')->first();
    }

    public function getSenderAttribute()
    {
        return $this->hasOne('App\User', 'id', 'sender_id')->first();
    }

    public function source()
    {
        //here we validate the type and return the source reference
        switch ($this->action->source_type) {
            case 'orders':
                $source = $this->hasOne('App\Order')->first();
            break;
        }
        //return $this->hasOne('App\xxx');
        return isset($source) ? $source : new Collection();
    }

    public function getPictureAttribute()
    {
        switch ($this->action->source_type) {
            case 'orders':
                return '';
            break;
            case 'products':
                return '';
            break;
        }

        return '';
    }

    public function scopeAfter($query, $input)
    {
        return $query->where('created_at', '>', $input);
    }

    public function scopeBefore($query, $input)
    {
        return $query->where('created_at', '<=', $input);
    }

    public function scopeDesc($query, $input = false)
    {
        return $query->orderBy('created_at', 'desc')->orderBy('id', 'desc');
    }

    public function scopeAuth($query, $input = false)
    {
        return $query->where('user_id', \Auth::id())->whereIn('action_type_id', $this->actionsType); //trans('notices.actions')
    }

    public function scopeOfStatus($query, $input)
    {
        return $query->where('status', 'like', $input);
    }
}
