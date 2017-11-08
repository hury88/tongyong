<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as HttpRequest;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Business;
use App\NewsCats;
use App\News;
use App\Resume;
use App\CVS;
/*
 * Antvel - Company CMS Controller
 *
 * @author  Gustavo Ocanto <gustavoocanto@gmail.com>
 */

use App\Company;

use App\Http\Requests\ContactFormRequest;



class JobController extends Job
{
    //二级列表信息
    public function sanlist()
    {
        $arr = (new NewsCats)->getNavigation(['catname', 'path', 'img2', 'id'], $GLOBALS['pid']);
        return $arr;
    }
//企业列表
    public function usergoodlist($where = [], $field = ['*'], $num = 4)
    {
        $arr=Business::where('has2','=','1')->get();
//        /dd($arr);
        return $arr;
    }


    public function __construct()
    {
        #@身份验证
        // $this->middleware('App\Http\Middleware\Authenticate', ['only' => 'request']);
        if ($GLOBALS['pid_data']) {
            $banimgsrc = img($GLOBALS['pid_data']->img1);
            view()->share('banimgsrc', $banimgsrc);
        }
    }

    // 申请职位
    public function request(HttpRequest $request)
    {
        if (is_null($request->business_name)) {
            return noticeResponseJson(412, '数据不完整', '缺少企业名称');
        }
        try {
            $csv = CVS::findOrFail($request->cvs_id);
        } catch (ModelNotFoundException $e) {
            return handleResponseJson(412, '您要投递的简历不存在,请刷新页面后重新选择');
        }
        try {
            $job = Job::findOrFail($request->recruit_id);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException();
        }
        if ($resume = Resume::c2b($csv->user_id, $job->user_id, $csv->id, $job->id)->first()) {
            return handleResponseJson(203, '您已投递过该岗位');
        }
        $resume = new Resume();
        $resume->title = $job->title;
        $resume->job_id = $job->id;
        $resume->job_cate_id = $job->ty;
        $resume->job_cate_name = v_id($job->ty, 'catname', 'news_cats');
        $resume->status = 0;
        $resume->person_id = $csv->user_id;
        $resume->business_id = $job->user_id;
        $resume->cvs_id = $csv->id;
        $resume->business_name = $request->business_name;
        if ($resume->save([], 'new_resume')) {
            $job->enroll_num = $job->enroll_num+1;$job->save();
            return handleResponseJson(200, '简历投递成功');
        }
        return handleResponseJson(412, '抱歉简历投递失败,请稍后再试');
    }

//招聘信息详情
    public function show($id)
    {

        $viewrow =  $id;
        $Job= new Job();
        $sanlist = $this->sanlist();
        $id_arr=$Job->v_id_arr($id);
        //dd($id_arr);
        if(!$id_arr){
            about(404);
        }
        $Job->enroll_num = $Job->enroll_num +1;
        $Job->save();
        if($id_arr->user_id){
        $userinfo= Business::where('user_id','=',$id_arr->user_id)->select("*")->get();
        }else{
        $userinfo='';
        }
        $sousuoarr=get_ssarr();
        $industryids=$sousuoarr[79];
        $positionids=$sousuoarr[80];
        $joblist=$this->job_list($id_arr->user_id);
        return view('job/show', compact('id_arr','userinfo','qiyegood','sanlist','industryids','positionids','joblist'));
    }
    //文章排序
    protected function newsorder($id)
    {
        $arr=array();
        $news = new News();
        $ordderlist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],["id"]);
        $arr['previd']=$this->getPrevArticleId($id,$ordderlist);

        $arr['nextid']=$this->getNextArticleId($id,$ordderlist);

        return $arr;
    }
    protected function getPrevArticleId($id,$ordderlist)
    {
        foreach ($ordderlist as $k=>$v){

            if($v->id==$id){
                $key=$k-1;
            }
        }
        if($key<0){
            return 0;
        }else{
            return $ordderlist[$key]->id;
        }
    }
    protected function getNextArticleId($id,$ordderlist)
    {
        foreach ($ordderlist as $k=>$v){
            if($v->id==$id){
                $key=$k+1;
                break;
            }
        }
        if($key==count($ordderlist)){
            return 0;
        }else{
            return $ordderlist[$key]->id;
        }
        return $ordderlist[$key]->id;
    }
//招聘信息列表
    public function joblist()
    {
        $sanlist = $this->sanlist();
//        /dd($sanlist);
        $Job = new Job();
        $ckey='';
        if(isset($_GET['title'])&&$_GET['title']!=''){
            $title=$_GET['title'];
            $ckey.='&title='.$title;
        }else{
            $title='';
        }
        if(isset($_GET['salary'])&&$_GET['salary']!=0){
            $salary=(int)$_GET['salary'];
            $ckey.='&salary='.$salary;
        }else{
            $salary=0;
        }

        if(isset($_GET['education'])&&$_GET['education']!=0){
            $education=(int)$_GET['education'];
            $ckey.='&education='.$education;
        }else{
            $education=0;
        }
        if(isset($_GET['experience'])&&$_GET['experience']!=0){
            $experience=(int)$_GET['experience'];
            $ckey.='&experience='.$experience;
        }else{
            $experience=0;
        }
        if(isset($_GET['nature'])&&$_GET['nature']!=0){
            $nature=(int)$_GET['nature'];
            $ckey.='&nature='.$nature;
        }else{
            $nature=0;
        }
        if(isset($_GET['stime'])&&$_GET['stime']!=0){
            $stime=(int)$_GET['stime'];
            $ckey.='&stime='.$stime;
        }else{
            $stime=0;
        }
        if(isset($_GET['order'])&&$_GET['order']!=0){
            $order=(int)$_GET['order'];
            $ckey.='&order='.$order;
        }else{
            $order=0;
        }
        if(isset($_GET['work_nature'])&&$_GET['work_nature']!=0){
            $work_nature=(int)$_GET['work_nature'];
            $ckey.='&work_nature='.$work_nature;
        }else{
            $work_nature=0;
        }
        if(isset($_GET['industryid'])&&$_GET['industryid']!=0){
            $industryid=(int)$_GET['industryid'];
            $industryidarr=explode(',',$industryid);
            $ckey.='&industryid='.$industryid;
        }else{
            $industryidarr=array();
            $industryid=0;
        }
        if(isset($_GET['positionid'])&&$_GET['positionid']!=0){
            $positionid=(int)$_GET['positionid'];
            $positionidarr=explode(',',$positionid);
            $ckey.='&positionid='.$positionid;
        }else{
            $positionidarr=array();
            $positionid=0;
        }
        $salaryarr=config("config.business.salary");
        $work_naturearr=config("config.business.work_nature");
        $naturearr=config("config.business.nature");
        $stimearr=config("config.business.stime");
        $experiencearr=config("config.business.experience");
        $educationarr=config("config.business.education");
        $sousuoarr=get_ssarr();
        $industryids=$sousuoarr[79];
        $positionids=$sousuoarr[80];
        $pagenewslist=$Job->v_pages([$GLOBALS['pid'], $GLOBALS['ty']],$title,$salary,$education,$experience,$nature,$stime,$order,$work_nature,$industryidarr,$positionidarr,['job.id','job.title','job.sendtime','job.salary','job.cityid','job.work_nature','job.education','job.experience','job.user_id','job.industryid','job.relative','businesses.logo','businesses.user_id','businesses.business_name'],8,9);
//        dd($pagenewslist);
        return view('job/list', compact('sanlist','title','order','positionid','positionids','positionidarr','naturearr','nature','educationarr','education','experiencearr','experience','stimearr','stime','industryid','industryids','positionid','industryidarr','salaryarr','salary','ckey','work_nature','work_naturearr','pagenewslist'));
    }
    //院校信息发布
    public function newslist()
    {
        $sanlist = $this->sanlist();
        $News = new News();
        $sousuoarr=get_ssarr();
        $yxarr=$sousuoarr[78][0];
        $xxarr=config('config.webarr.infotypeid');

        $ckey='';
        if(isset($_GET['title'])&&$_GET['title']!=''){
            $title=$_GET['title'];
            $ckey.='&title='.$title;
        }else{
            $title='';
        }
        if(isset($_GET['academyid'])&&$_GET['academyid']!=0){
            $academyid=(int)$_GET['academyid'];
            $ckey.='&academyid='.$academyid;
        }else{
            $academyid=0;
        }
        if(isset($_GET['infotypeid'])&&$_GET['infotypeid']!=0){
            $infotypeid=(int)$_GET['infotypeid'];
            $ckey.='&infotypeid='.$infotypeid;
        }else{
            $infotypeid=0;
        }
        if(isset($_GET['order'])&&$_GET['order']!=0){
            $order=(int)$_GET['order'];
            $ckey.='&order='.$order;
        }else{
            $order=0;
        }
        $pagenewslist=$News->v_yxpages([$GLOBALS['pid'], $GLOBALS['ty']],$title,$academyid,$infotypeid,$order,['id','title','img1','content'],8,7);
        return view('job/yxlist', compact('sanlist','yxarr','xxarr','title','ckey','academyid','infotypeid','order','pagenewslist'));
    }
    //简历列表加分页
    public function resumelist()
    {
        $sanlist = $this->sanlist();
        $Job = new Job();
        // $carousel = $news->v_list([$request->get($pid,0),$request->get($ty,0),$request->get($tty,0)]);
//        $newslist = $news->v_list([$GLOBALS['pid'],$GLOBALS['ty']],['id','title','sendtime','img1','content'],9);
//
//        $list['newslist']=$newslist;

//        $pagenewslist=$Job->v_pages($key,['user_id','business_name','logo','business_introduction'],16,9);
        //dd($pagenewslist);
        return view('job/resumelist', compact('sanlist'));
    }
    //院校信息发布详情
    public function view($id)
    {
        $viewrow =  $id;
        $news = new News();
        $id_arr=$news->v_id_arr($id);
        if(!$id_arr){
            about(404);
        }
        if($id_arr->user_id){
            $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
        }else{
            $id_arr->qyname="平台管理员";
        }
        $arr=$this->newsorder($id);
        $id_arr->previd=$arr['previd'];
        $id_arr->nextid=$arr['nextid'];
        if($id_arr->previd>0){
            $id_arr->prevlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->previd);
            $id_arr->prev=v_id($id_arr->previd,"title");

        }else{
            $id_arr->prevlink='javascript:void(0)';
        }
        if($id_arr->nextid>0){
            $id_arr->nextlink=u($GLOBALS['pid_path'],$GLOBALS['ty_path'],$id_arr->nextid);
            $id_arr->next=v_id($id_arr->nextid,"title");
        }else{
            $id_arr->nextlink='javascript:void(0);';
        }
        return view('job/view', compact('id_arr'));

    }
    //简历详情
    public function resumeview($id)
{
    $id_arr = User::where("certified",1)->find($id);

    if($id_arr){
        $id_arr = $id_arr->business;

    } else {
        abort(404);
    }
//        return view('errors.404');
    if($id_arr->user_id){
        $id_arr->qyname=v_id($id_arr->user_id,'member_name', 'users');
    }else{
        $id_arr->qyname="平台管理员";
    }
    //机构职业证书

    return view('job/resumeview', compact('id_arr'));

}
//企业职位列表
    private function job_list($user_id)
    {
        $str = $this->v_list([$GLOBALS['pid'],$GLOBALS['ty']],$user_id,["title","relative",'id'],14);

        return $str;
    }
}
function get_ssarr()
{
    $data = \Illuminate\Support\Facades\DB::table('nature')->select('id','pid','typeid','catname')->orderBy('disorder','desc')->orderBy('id','asc')->get();

    foreach ($data as $v) {
        $d[$v->typeid][$v->pid][$v->id]=$v->catname;
    }

    return $d;
}
