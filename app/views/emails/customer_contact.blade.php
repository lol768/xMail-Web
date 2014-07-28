<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>xMail Contact Request</h2>

		<div>
			Thank you for reaching out to us! We've included a copy of what information was sent to the xMail administrators for your records below. To update us on any information, please submit a new contact request.
            <br/><br/>
            <table>
                <tbody>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Your Email
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4; padding: 5px;'>
                            {{ $email }}
                        </td>
                    </tr>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Minecraft Username
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4; padding: 5px;'>
                            @if(!$mcname) <i>Not Provided</i> @else {{ $mcname }} @endif
                        </td>
                    </tr>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4;border-bottom: 1px solid #045FB4; padding: 5px;'>
                            Message Content
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4;border-bottom: 1px solid #045FB4; padding: 5px;'>
                            {{ $content }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <br/><br/>
            <i>We will get back to you as soon as we can - we have lives too!</i>
		</div>
	</body>
</html>
