<?php
	$success = "";
	$error = "";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$name = trim($_POST["name"] ?? "");
		$contact = trim($_POST["contact"] ?? "");
		$text = trim($_POST["text"] ?? "");
		
		if ($name === "" || $text === "") {
			$error = "Fill all required (*) fields!";
		} else {
			$file = "contact.csv";
			
			$handle = fopen($file, "a");
			
			// make header when empty file
			if (filesize($file) === 0) {
				fputcsv($handle, ["Date", "Name", "Mail", "Text"]);
			}
			
			fputcsv($handle, [
				date("Y-m-d H:i:s"),
				$name,
				$contact,
				$text
			]);
			
			fclose($handle);
			
			$success = "Message got send successfully ✅";
		}
	}
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>php-contactform Demo</title>
		<style>
			.cr {
				color: red;
			}
			textarea {
				resize: none;
			}
			input {
				height: 20px;
				width: 500px;
			}
			textarea {
				height: 200px;
				width: 500px;
			}
		</style>
	</head>
	<body>
		<h1>Contact Form</h1>

		<?php if ($error): ?>
		  <p class="error"><?= htmlspecialchars($error) ?></p>
		<?php endif; ?>

		<?php if ($success): ?>
		  <p class="success"><?= htmlspecialchars($success) ?></p>
		<?php endif; ?>

		<form method="post">
			<label>
				Name <span class="cr" title="This field is required!">*</span>
				
				<br>
				
				<input type="text" name="name" required>
			</label>
			
			<br><br>
			
			<label>
				Mail
				
				<br>
				
				<input type="text" name="contact">
			</label>
			
			<br><br>
			
			<label>
				Text <span class="cr" title="This field is required!">*</span>
				
				<br>
				
				<textarea name="text" required></textarea>
			</label>
			
			<br><br>
			
			<button type="submit">Send</button>
		</form>
	</body>
</html>
