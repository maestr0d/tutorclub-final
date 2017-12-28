  <?php
  $message = "
   <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Demystifying Email Design</title>
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
</head>
<body style='margin:0;padding:0'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='padding:10px 0 30px 0'>
<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border:1px solid #ccc;border-collapse:collapse'>
<tr>
<td align='center' bgcolor='#000000' style='background-repeat:repeat;background-image:url(https://www.toptal.com/designers/subtlepatterns/patterns/ep_naturalblack.png);padding:20px 0 10px 0;color:#153643;font-size:28px;font-weight:bold;font-family:Arial,sans-serif'>
<h1 style='font-size:35px;color:white'>Welcome to TutorClub!</h1>
</td>
</tr>
<tr>
<td bgcolor='#ffffff' style='padding:30px 30px 40px 30px'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='color:#153643;font-family:Arial,sans-serif;font-size:24px;text-align:center;padding-bottom:10px'>
<b>Thank you for registering with us!</b>
</td>
</tr>
<tr>
<td style='padding:20px 0 30px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px'>
Please confirm your email address by clicking this button:
</td>
</tr>
<tr>
<td style='padding:0 0 10px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px;text-align:center'>
<a style='display:inline-block;width:200px;height:50px;background-color:#70bbd9;color:white;font-weight:bold;font-size:25px;text-decoration:none;line-height:50px;text-align:center' href='http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."'>Confirm Email</a>
</td>
</tr>
<tr>
<td style='padding:20px 0 10px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px;text-align:justify'>
If you are having any problems with the button, copy and paste the following link into your browser's address bar:
</td>
</tr>
<tr>
<td style='padding:20px 0 30px 0;color:#153643;font-family:Arial,sans-serif;font-size:16px;line-height:20px'>
<a href='http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."'>http://www.tutorclub.site/verify.php?email=".$email."&hash=".$hash."</a>
</td>
</tr>
<tr>
<td style='padding:0;color:#153643;font-family:Arial,sans-serif;font-size:10px;color:gray;line-height:20px;text-align:justify'>
This email was sent out automatically. Do not reply to this email, instead, if you have any quetions or concerns, please send an email to <a style='color:gray'href=''>support@tutorclub.site</a>. This wasn't you? <a style='color:gray' href=''>Click here</a> if you have received this e-mail by mistake.
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td style='padding:30px 30px 30px 30px;background-repeat:repeat;background-image:url(https://www.toptal.com/designers/subtlepatterns/patterns/ep_naturalblack.png)'>
<table border='0' cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='color:#fff;font-family:Arial,sans-serif;font-size:14px' width='75%'>
&copy; TutorClub 2017<br/>
</td>
<td align='right' width='25%'>
<table border='0' cellpadding='0' cellspacing='0'>
<tr>
<td style='font-family:Arial,sans-serif;text-align:center;font-size:12px;font-weight:bold'>
<a href='http://www.tutorclub.site/' style='color:#fff'>
Back to site
</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>
"; // Our message above including the link
  ?>