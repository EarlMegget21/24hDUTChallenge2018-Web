<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    <?php if(isset($_SESSION['login'])){
        echo 'var currentLogin="'.$_SESSION['login'].'"';
    } ?>
</script>
<script src="/Web/js/header.js"></script>
<!--<script src="/Web/js/page.js" async defer></script>-->
