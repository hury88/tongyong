<?php

namespace app;

/*
 * Antvel - Business Model
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Eloquent\Model;
use App\User;
use App\Notice;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resume extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'resume';
    // public $timestamps = false;
    public $primaryKey = 'id';
    // public $incrementing = false;
    protected $statuses = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'business_id',
        'status',
        'business_name',
        'cv_id',
    ];
    protected $appends = ['dao'];

    public function __construct()
    {
        $this->statuses = config('config.resume.business_status');
        parent::__construct();
    }
    /**
     * Get business user.
     *
     * @return belongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function save(array $options = [], $new = false)
    {
        $status_changed = (isset($this->original['status']) && $this->attributes['status'] != $this->original['status']) || (isset($options['status']) && $this->attributes['status'] != $options['status']);
        $saved = parent::save($options);
        if ($saved) {
            if ($status_changed || $new) {
                $this->sendNotice();
            }
        }

        return $saved;
    }

    public function sendNotice()
    {
        switch ($this->attributes['status']) {
            case 0:// new
                Notice::create([//发送给个人
                    'action_type_id' => 11,
                    'source_id'      => $this->id,
                    'user_id'        => $this->person_id,
                    'sender_id'      => $this->business_id,
                    'sprintf' => $this->business_name,
                    'content' => '请去简历中心查看详情'
                ]);
                Notice::create([
                    'action_type_id' => 11,
                    'source_id'      => $this->id,
                    'user_id'        => $this->business_id,
                    'sender_id'      => $this->person_id,
                    'title' => "您收到了一条新的简历投递信息",
                ]);
            break;
            case 1:// fromRefuse
                Notice::create([//发送给个人
                    'action_type_id' => 12,
                    'source_id'      => $this->id,
                    'user_id'        => $this->person_id,
                    'sender_id'      => $this->business_id,
                    'sprintf' => $this->business_name,
                    'content' => '很遗憾,您申请'.$this->title.'的职位刚刚被拒绝'
                ]);
                Notice::create([
                    'action_type_id' => 12,
                    'source_id'      => $this->id,
                    'user_id'        => $this->business_id,
                    'sender_id'      => $this->person_id,
                    'title' => "您刚刚拒绝了一位求职者",
                ]);
            break;
            case 3:// toRefuse
                Notice::create([
                    'action_type_id' => 13,
                    'source_id'      => $this->id,
                    'user_id'        => $this->person_id,
                    'sender_id'      => $this->business_id,
                    'sprintf' => $this->business_name,
                    'content' => '请去简历中心查看详情'
                ]);
                Notice::create([
                    'action_type_id' => 13,
                    'source_id'      => $this->id,
                    'user_id'        => $this->business_id,
                    'sender_id'      => $this->person_id,
                    'title' => "很遗憾,您发出的面试刚刚被拒绝",
                ]);
            break;
            case 2:// ok
                $flag = Notice::create([//发送给个人
                    'action_type_id' => 14,
                    'source_id'      => $this->id,
                    'user_id'        => $this->person_id,
                    'sender_id'      => $this->business_id,
                    'sprintf' => $this->business_name,
                    'content' => '请去简历中心查看详情'
                ]);
                if($flag)
                $a = Notice::create([
                    'action_type_id' => 14,
                    'source_id'      => $this->id,
                    'user_id'        => $this->business_id,
                    'sender_id'      => $this->person_id,
                    'title' => "您已成功发出面试邀请，请等待应聘者响应",
                ]);
            break;
        }
        // $this->sendMail();
        return $this;
    }

    public function getStatusAttribute()
    {
        return $this->statuses[$this->attributes['status']];
    }

    public function getDAOAttribute()
    {
        switch ($this->attributes['status']) {
            case 0:
                return '<a href="javascript:;" class="feedback" data-dao="ok" data-id="'.$this->attributes['id'].'">邀请面试</a>'
                    .'|'.
                    '<a href="javascript:;" class="feedback" data-dao="refuse" data-id="'.$this->attributes['id'].'">拒绝</a>'
                    ;
                break;
            default:
                return '<a href="javascript:;" class="feedback" data-id="'.$this->attributes['id'].'"></a>';
                break;
        }
        // return $this->statuses[$this->attributes['status']];
    }

    // 企业中心 查询 简历
    public function scopeB2r($query, $id, $business_id)
    {
        return $this
            ->whereId($id)
            ->whereBusinessId($business_id);
    }
    // 查询投递记录是否重复
    public function scopeC2b($query, $person_id, $business_id, $cvs_id, $job_id)
    {
        return $this
            ->wherePersonId($person_id)
            ->whereBusinessId($business_id)
            ->whereJobId($job_id)
            ->whereCvsId($cvs_id);
    }
}
