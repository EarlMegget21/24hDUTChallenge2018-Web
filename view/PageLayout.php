<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="/Web/img/logo.png" />
        <title><?php echo $pagetitle; ?></title>

        <link rel="stylesheet" type="text/css" href="/Web/css/styles.css">
    </head>
    <body>

        <header>
            <?php require File::build_path(array('view', 'component', 'Header.php')); ?>
        </header>

        <div id="content">
        </div>

        <footer>
            <?php require File::build_path(array('view', 'component', 'Footer.php')); ?>
        </footer>

        <?php require File::build_path(array('view', 'component', 'Scripts.php')); ?>

        <script>
            changePage({
                'controller': <?php echo "'".$page."'"; ?>,
                'action': <?php echo "'".$action."'";
                foreach ($_GET as $key=>$value){
                    if(strcmp($key, "page") && strcmp($key, "action"))
                        echo ", '".$key."':'".lcfirst($value)."'";
                } ?>
            },
            <?php echo "'".ucfirst($action)."'" ?>);
        </script>

    </body>
</html>

