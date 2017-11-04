<?php

namespace app\Http\Controllers;

/*
 * Antvel - Notice Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\ActionType;
use App\Http\Controllers\Controller;
use App\Notice;

class NoticesController extends Controller
{
    public function unauth()
    {
        if (\Auth::check()) {
            return false;
        }
        if (\Request::wantsJson()) {
            return json_encode(['error' => 'need login']);
        } else {
            return redirect('/auth/login');
        }
    }

    protected function getActions($notices)
    {
        $actions = [];
        foreach ($notices as $notice) {
            $actions[] = $notice['action_type_id'];
        }

        return ActionType::unique($actions)->get()->each(function ($action) {
            $action->useAs('notice');
        })->toIdArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paginator = Notice::auth()->desc()->paginate(20);
        $pagenewslist = $paginator->toArray();
        Notice::auth()->where('status', 1)->update(['status' => 2]);
        // $notices = $data['notices'] = $data['data'];
        // unset($data['data']);
        $action_types = $this->getActions($pagenewslist['data']);
        $user = \Auth::user();
        $_title = ['系统消息'];
        $_first = 'notices';
        $_next = '';
        $ckey = '';
        // extract($data);

        return View('business.notices', compact('user', 'ckey', 'action_types', 'pagenewslist', '_title', '_first', '_next'));
    }

    public function push($force = false)
    {
        $date = date('Y-m-d H:i:s');

        $data = [
            'push' => Notice::auth()->ofStatus('new')->count(),
        ];

        $request = \Request::all();
        if (!isset($request['date'])) {
            $data['date'] = $date;
            $data['notices'] = Notice::auth()->desc()->get()->slice(0, 10)->toArray();
        } else {
            $data['date'] = $request['date'];
            if ($force || Notice::auth()->after($data['date'])->count()) {
                $data['notices'] = Notice::auth()->desc()->get()->slice(0, 10)->toArray();
            }
            if (isset($data['notices']) && count($data['notices'])) {
                $data['date'] = $date;
            } else {
                unset($data['notices']);
            }
        }
        if (isset($data['notices'])) {
            $data['action_types'] = $this->getActions($data['notices']);
        }
        $this->json_or_dd($data);
    }

    public function check($id = 0)
    {
        $request = \Request::all();
        if ($id) {
            Notice::auth()->find($id)->update(['status' => 'read']);
        } elseif (isset($request['date'])) {
            Notice::auth()->ofStatus('new')->before($request['date'])->update(['status' => 'unread']);
        }
        $this->push(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $data = \Request::all();
        $this->json_or_dd($data);
        $notice = Notice::create($data);
        $this->json_or_dd($notice);
        //si-nuevo
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notice = Notice::auth()->desc()->find($id);
        $this->json_or_dd($notice->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $data = \Request::all();
        $this->json_or_dd($data);

        $notice = Notice::find($id)->fill($data)->save();
        $this->json_or_dd($notice->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //maybe
    }
}
