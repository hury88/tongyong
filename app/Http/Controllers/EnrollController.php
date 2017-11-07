<?php

namespace app\Http\Controllers;

/*
 * Antvel - Orders Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Http\Controllers\Controller;
use App\Notice;
use App\Enroll;
use App\Education;
use App\Repositories\OrderRepository;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnrollController extends Controller
{
    /**
     * The order repository instance.
     *
     * @var OrderRepository
     */
    protected $order;

    /**
     * Create a new controller instance.
     *
     * @param OrderRepository $order
     *
     * @return void
     */
    public function __construct(OrderRepository $enroll)
    {
        $this->middleware('App\Http\Middleware\Authenticate');

        $this->enroll = $enroll;
    }

    /**
     * Adds the selected product to the BASE cart.
     *
     * @param string $destination type or order ('cart','later',etc)
     * @param int    $productId   The id of the product to be added
     *
     * @return Response
     */
    public function create($tid, Request $request)
    {
        //making sure if the product requested exists, otherwise, we throw a http exception
        try {
            $education = Education::findOrFail($tid);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }
        try {
            $person = \Auth::user();
        } catch (Exception $e) {
            throw new NotFoundHttpException();
        }
        $enroll = new Enroll();
        if (Enroll::ofEncroll($person->id, $tid)->first()) {
            return handleResponseJson(201, '您已报名过此项目,请去个人中心查看报名表');
        }
        // 生成报名
        $enroll->tid = $education->id;
        $enroll->title = $education->title;
        $enroll->uid = $person->id;
        $enroll->cuid = $education->user_id;
        $enroll->telphone = $person->telphone;
        $enroll->email = $person->email;
        $enroll->typeid = $education->pid;
        $enrollid = $enroll->save();

        if ($enrollid) {
            $education->enroll_num = $education->enroll_num +1;
            Notice::sendEnroll($enroll->cuid, $enroll->title, url()->previous());
            $education->save();
            return handleResponseJson(200, '报名成功,进入个人中心查看', route('p_enroll'));
        } else {
            return handleResponseJson(201, '报名失败', '请稍后再试');
        }

    }
}
