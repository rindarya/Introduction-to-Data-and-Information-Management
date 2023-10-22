<HTML>

<HEAD>
	<TITLE> Introduction to Data and Information Management </TITLE>
</HEAD>

<BODY>
	<H1>Introduction to Data and Information Management</H1>

	<?php

	require 'Barang.php';

	$barangFetcher = new Barang();
	$barangFetcher->fetch();

	?>
</BODY>

</HTML>