<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>xMail Confirmation Code</h2>

		<div>
			Thank you for signing up for an xMail account! In order to verify that you own the Minecraft account "{{ $mcname }}" we need you to type the following command on any <a href="{{ URL::route('servers') }}">xMail supported server</a>. This code will expire after 24 hours and if not entered will cancel registration. 
            <br/><br/>
            <b>The code is case-sensitive - we recommend you copy and paste this command into Minecraft!</b><br/>
            <div style='font-size:24px;padding:10px;margin:5px 0;border-radius:5px;border:1px solid #007DBB;background-color:#ADE5FF;display:inline-block;'>/xmail confirm {{ $token }}</div>
            <br/>
            <i>If you didn't register for an xMail account, you can safely ignore this email or <a href="{{ URL::route('contact') }}">contact us</a> for more information.</i>
		</div>
	</body>
</html>
