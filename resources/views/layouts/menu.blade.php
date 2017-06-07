<li><a href="/panel">Главная</a></li>

<li><a href="/panel/fuels">Топливо</a></li>
<li><a href="/panel/login">Login</a></li>
<li><a href="/test">Register</a></li>



<script>
    $(function () {
        $('li a').each(function () {
            if(window.location.href == this.href) {
                $(this).parent().addClass('active');
                $(this).parents('.dropdown').addClass('active');
            }
        });
    });
</script>