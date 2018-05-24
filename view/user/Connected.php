<?php
require File::build_path(array('view','main','Accueil.php')); ?>
<script>
    <?php if(isset($_SESSION['login'])){ ?>
    connected('<?php echo $_SESSION['login']; if(Session::is_admin()){echo "',1";}else{echo "',0";} ?>)
<?php } ?>
    currentLogin='<?php echo $_SESSION['login']; ?>'
</script>
