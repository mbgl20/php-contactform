<?php
	// KEEP IN MIND!!! THIS IS JUST FOR DEMONSTATION! YOU SHOULD NOT HAVE THIS FILE ON YOUR SERVER ACCESSIBALE TO EVERYONE FOR PRIVACY REASONS!
	
	$file = "../contact.csv";
	
	if (!file_exists($file)) {
		die("Keine Kontakte vorhanden.");
	}

	$rows = array_map("str_getcsv", file($file));
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>php-contactform Demo</title>
		<style>
			table {
				border-collapse: collapse;
			}
			td, th {
				border: 1px solid #ccc;
				padding: 6px;
			}
		</style>
	</head>
	<body>
		<h1>Contact Requests</h1>
		
		<table>
			<?php foreach ($rows as $i => $row): ?>
				<tr>
					<?php foreach ($row as $cell): ?>
						<?= $i === 0 ? "<th>" : "<td>" ?>
						<?= htmlspecialchars($cell) ?>
						<?= $i === 0 ? "</th>" : "</td>" ?>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>
