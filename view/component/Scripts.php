<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
	<?php if(isset($_SESSION['login'])){
		echo 'var currentLogin="'.$_SESSION['login'].'"';
	} ?>
</script>

<script src="/Web/js/header.js"></script>

<script type="text/javascript" src="/Web/js/material-components-web.min.js"></script>

<script type="text/javascript">
	window.mdc.autoInit()
</script>

<script>
	drawer = new mdc.drawer.MDCTemporaryDrawer(document.querySelector('.mdc-drawer--temporary'))
	document.querySelector('.mdc-top-app-bar__navigation-icon').addEventListener('click', () => {drawer.open = true})
</script>
