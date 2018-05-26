<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="/Web/img/logo.png" />
        <title><?php echo $pagetitle; ?></title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/Web/css/material-components-web.min.css">
        <link rel="stylesheet" type="text/css" href="/Web/css/styles.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
    </head>
    <body class="mdc-typography">

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

        <script type="text/javascript" src="/Web/js/material-components-web.min.js"></script>
        <script type="text/javascript">
            window.mdc.autoInit();
        </script>
        <script>
            drawer = new mdc.drawer.MDCTemporaryDrawer(document.querySelector('.mdc-drawer--temporary'));
            document.querySelector('.mdc-top-app-bar__navigation-icon').addEventListener('click', () => drawer.open = true);
        </script>
    </body>
</html>

