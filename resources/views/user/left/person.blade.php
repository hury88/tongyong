<h2 class="personal-order">账户设置</h2>
<div class="personal-order-nav">
    <ul>
        <li id="person-menu-person-default">
            <a class="yiji-a" href="/person">基本信息<i></i></a>
        </li>
        <li id="person-menu-person-password">
            <a class="yiji-a" href="/person/password">安全设置<i></i></a>
        </li>
        <li id="person-menu-person-certified">
            <a class="yiji-a" href="/person/certified">实名认证<i></i></a>
        </li>
        <li id="person-menu-person-message">
            <a class="yiji-a" href="/person/message">消息管理({{App\Notice::auth()->where('status', 1)->count()}})<i></i></a>
        </li>
    </ul>
</div>
<script>
    document.getElementById("person-menu-person-{{$_first}}").className = "nav-on";
</script>