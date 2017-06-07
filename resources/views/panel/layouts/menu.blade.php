@if (Auth::guest())
    <li><a href="{{ url('/login') }}">Login</a></li>
@else
    <li><a href="/panel">Главная</a></li>
    <li><a href="/panel/fuel">Топливо</a></li>
    <li><a href="/panel/action">Акция</a></li>
    <li><a href="/panel/map">Карта</a></li>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
        </ul>
    </li>
@endif
<script>
    $(function () {
        $('li a').each(function () {
            if (window.location.href == this.href) {
                $(this).parent().addClass('active');
                $(this).parents('.dropdown').addClass('active');
            }
        });
    });
</script>