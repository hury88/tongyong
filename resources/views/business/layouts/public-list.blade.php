@extends('business.layouts.public')
@section('inbox')
    <div class="resume-inbox">
        <div class="order-manager-header clearfix">
            <div class="manager-header-right fr">
                @yield('form')
            </div>
        </div>
        <div class="order-manager-content">
            <form>
                <table class="academy-table" width="101%" cellpadding="0" cellspacing="0">
                    <tr class="manager-firsttr">
                        <th class="manager-firstth">
                            <label><input class="quanxuan" type="checkbox"/>全选</label>
                        </th>
                        @foreach($th as $title)
                        <th>{{$title}}</th>
                        @endforeach
                        <th>时间</th>
                        <th>操作</th>
                    </tr>
                    <tbody>
                    @yield('tbody')
                    </tbody>
                </table>
                <div class="manager-lasttr clearfix">
                    <div class="manager-firstth">
                        <label><input class="quanxuan" type="checkbox"/>全选</label>
                    </div>
                    <div class="manager-deletetd">
                        <a id="del" href="javascript:;" class="batchs-delete"><img src="/img/dele.png"/>批量删除</a>
                    </div>
                    <div class="table-pager">
                        @include('partial.paginator')
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop