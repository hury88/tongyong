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
use App\Education;

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
    protected $actionsType = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11,12,13,14,15,16,17,18];

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
        $attr['created_at'] = date('Y-m-d H:i:s');
        if (!isset($attr['title'])) {
            $attr['title'] = ActionType::find($attr['action_type_id'])->notice_template;
            if(isset($attr['sprintf'])) $attr['title'] = sprintf($attr['title'], $attr['sprintf']);
        }
        unset($attr['sprintf']);
        if (strpos($attr['user_id'], '|')) {
            $user_id_set = explode('|', $attr['user_id']);
            $user_id_set = array_unique($user_id_set);
            $user_title_set = explode('|', $attr['title']);
            foreach ($user_id_set as $user_id) {
                $attr['user_id'] = $user_id;
                self::insert($attr);
            }
            return true;
        }
        return self::insert($attr);
        // parent::create($attr);
    }
    public static function sendCertification($sender_id, $is_person=1)
    {
        if($is_person == 1) {
            $action_type_id = 6;
            $title = '个人会员实名认证申请';
        } else {
            $action_type_id = 1;
            $title = '企业会员实名认证申请';
        }
        #发送认证请求
        $flag = Notice::create([
            'user_id'        => 0,
            'sender_id'      => $sender_id,
            'action_type_id' => $action_type_id,
            'source_id'      => 0,
            'title' => $title,
        ]);
        if ($flag) {
            Notice::create([
                'user_id'        => $sender_id,
                'sender_id'      => 0,
                'action_type_id' => $action_type_id,
                'source_id'      => 0,
            ]);
        }
        return $flag;
    }
    public static function sendEnroll($business_id, $education_title, $url)
    {
        $person = \Auth::user()->profile;
        #发送给个人
        $public_content = '查看国际教育<a href="'.$url.'" target="_blank">'.$education_title.'</a>';
        $flag = Notice::create(array(
            'user_id'        => $person->user_id,
            'sender_id'      => $business_id,
            'action_type_id' => 9,
            'source_id'      => 0,
            'content' => $public_content.'最新动态',
        ));
        #发送给企业
        if ($flag) {
            Notice::create([
                'user_id'        => $business_id,
                'sender_id'      => $person->user_id,
                'action_type_id' => 10,
                'source_id'      => 0,
                'content' => "用户@{$person->real_name},刚刚报名了{$education_title}项目;".$public_content,
            ]);
        }
        return $flag;
    }
    public static function sendOrder($person_id, $business_id, $order_id, $orderno)
    {
        #发送给个人
        $flag = Notice::create([
            'action_type_id' => 4,
            'source_id'      => $order_id,
            'user_id'        => $person_id,
            'sender_id'      => $business_id,
            'title' => "恭喜您的订单创建成功",
            'content' => "订单号:$orderno",
        ]);
        #发送给企业
        if ($flag) {
            Notice::create([
                'action_type_id' => 4,
                'source_id'      => $order_id,
                'user_id'        => $business_id,
                'sender_id'      => $person_id,
                'title' => "您收到了一个新的订单($orderno)",
                'content' => "订单号:$orderno",
            ]);
        }
        return $flag;
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
