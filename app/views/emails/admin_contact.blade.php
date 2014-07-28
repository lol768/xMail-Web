<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>xMail Customer Contact Request</h2>

		<div>
			A customer has completed the contact form. The information provided can be found below.
            <br/><br/>
            <table>
                <tbody>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Customer Email
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
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Minecraft Account UUID
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4; padding: 5px;'>
                            @if(!$mcuuid) <i>Not Applicable</i> @else {{ $mcuuid }} @endif
                        </td>
                    </tr>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Logged In User
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4; padding: 5px;'>
                            @if(!$currUser) <i>Not Logged In</i> @else {{ $currUser }} @endif
                        </td>
                    </tr>
                    <tr>
                        <th style='width: 150px; text-align:left;vertical-align: top;border-top: 1px solid #045FB4; padding: 5px;'>
                            Sender IP
                        </th>
                        <td style='max-width: 300px;border-top: 1px solid #045FB4; padding: 5px;'>
                            {{ $ip }}
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
		</div>
	</body>
</html>
