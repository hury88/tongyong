<?php

namespace app;

use App\Eloquent\Model;

class Enroll extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enroll';

    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // $fillable属性和$guarded
    protected $fillable = [
    ];
    public static function get_count()
    {
        $keys = ['typeid', 'tid', 'uid'];
        $values = func_get_args();
        $relations = array_combine($keys, $values);
        $i = 0;
        foreach($relations as $key => $val) {
            if ($val) {
                if ($i==0) {
                    $query = self::where($key,$val);
                } else {
                    $query->where($key,$val);
                }
            }
            ++$i;
        }
        return $query->count();
    }

    public function create($training_id, Request $request)
    {
        //making sure if the product requested exists, otherwise, we throw a http exception
        try {
            $training = Training::findOrFail($training_id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }

        $person = \Auth::user()->hasOnePerson;
        $order = new Order();
        if (Order::ofEncroll($person->user_id, $training_id)->theStatus('new')->first()) {
            return handleResponseJson(201, '您已报名过此课程,请去订单中心查看详情');
        }

        // 生成订单号
        $order->orderno = Order::orderno();
        $order->seller_id = $training->user_id;
        $order->training_id = $training->id;
        $order->training_img = $training->img1;
        $order->training_title = $training->title;
        $order->training_period = $training->period;
        $order->price = $training->price;

        $order->buyer_id = $person->user_id;
        $order->buyer_name = $person->real_name;

        $business = Business::whereUserId($order->seller_id)->select('business_name')->first();
        $order->business_name =  is_null($business) ? '中国职业培训网' : $business->business_name;

        $orderid = $order->save();

        if ($orderid) {
            $training->enroll_num = $training->enroll_num +1;
            $training->save();
            return handleResponseJson(200, '报名成功,进入个人中心查看', route('p_order'));
        } else {
            return handleResponseJson(201, '报名失败', '请稍后再试');
        }

    }

}
