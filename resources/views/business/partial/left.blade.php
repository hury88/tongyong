<div class="member-safety-left fl">
    <div class="member-logo">
        <a href="javascript:;"><img src="/img/vip-logo.png"/></a>
        <a href="javascript:;" class="icon-nav"></a>
    </div>
    <div class="left-nav-lists">
        <ul class="left-navlists-ul">
            @foreach(trans('business.menu') as $b_route => $b_m_info)
            <li class="left-navlists-li {{isset($GLOBALS['uri'][1]) && $GLOBALS['uri'][1] == $b_route ? 'nav-active' : ''}}">
            <?php $b_route = trans('business.route_prefiex').$b_route ?>
                <a href="{{route($b_route)}}">
                    <i class="{{$b_m_info['icon']}}"></i>
                    <p>{{$b_m_info['title']}}</p>
                </a>
                    @if(isset($b_m_info['next']))
                    <div class="Two-columns">
                        <dl>
                            @foreach($b_m_info['next'] as $index => $category_path_2)
                            <dt{{isset($GLOBALS['uri'][2]) && $GLOBALS['uri'][2] == $index ? ' class="erji-selected"' : ''}}><a href="{{route($b_route) .'/'. $index }}">{{$category_path_2['title']}}</a></dt>
                            @endforeach
                        </dl>
                    </div>
                    @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>