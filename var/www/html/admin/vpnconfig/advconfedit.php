<?php

// configuration
//$url = '/admin/vpnconfig/advconfedit.php';
$file = '/etc/openvpn/server.conf';

// check if form has been submitted
if (isset($_POST['text']))
{
    // save the text contents
    file_put_contents($file, $_POST['text']);

    // redirect to form again
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text = file_get_contents($file);

?>
<!-- HTML form -->

<style type="text/css">
	#text {
		width: 100%;
		min-height: 400px;
		margin: 0 0 10px 0;
		resize: vertical;
	}
</style>
<form action="/admin/vpnconfig/advconfedit" method="post">
	<textarea id="text" name="text"><?php echo htmlspecialchars($text) ?></textarea>
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-3">
			<input type="submit" class="btn btn-default pull-left">
			<input type="reset" class="btn btn-default pull-right">
		</div>
		<div class="col-lg-5"></div>
	</div>
</form>
