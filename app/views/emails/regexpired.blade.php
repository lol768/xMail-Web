<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>xMail Account Confirmation Expiration</h2>

		<div>
			The 24-hour limited time confirmation code for your xMail account has expired. We've cancelled your registration by deleting your set password, email, and confirmation code. To re-register please click <a href="{{ URL::route('register') }}">here</a>.
            <br/><br/>
            If you received this email in error, please <a href="{{ URL::route('contact') }}">contact us</a> to let us know.
		</div>
	</body>
</html>
