@extends('business.layouts.public')
@section('inbox')
<div class="job-posted">
    <form>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>类别</span>
            <div class="job-posted-values">
                <select>
                    <option value="视频培训">视频培训</option>
                    <option value="教材培训">教材培训</option>
                </select>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>在线学习课程名称</span>
            <div class="job-posted-values">
                {{--<input class="job-name" type="text" placeholder="请填写课程标题名称"/>--}}
                {{--<textarea name="" id="" cols="30" rows="10"></textarea>--}}
                {{--<input class="job-name" type="text" placeholder="请填写课程标题名称"/>--}}
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>课节</span>
            <div class="job-posted-values">
                <select>
                    <option value="请选择课节">请选择课节</option>
                </select>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>课程有效期</span>
            <div class="job-posted-values">
                <input class="job-name" type="text"/>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>主讲人</span>
            <div class="job-posted-values">
                <input class="job-name" type="text"/>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"><b>*</b>价格</span>
            <div class="job-posted-values">
                <input class="job-name" type="text"/>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property">培训详情</span>
            <div class="job-posted-values">
                <img src="img/edit.jpg"/>
            </div>
        </div>
        <div class="job-posted-dv">
            <span class="job-posted-property"></span>
            <div class="job-posted-values">
                <input class="save-publish" type="submit" value="保存并发布"/>
                <input class="only-save" type="button" value="仅保存"/>
                <input class="only-save" type="button" value="取消"/>
            </div>
        </div>
        <div class="black77"></div>
    </form>
</div>
@stop