<?php
class controller_sendmail extends Controller
{
	function action_index($param=null)
	{	

		if (!count($_POST)) 
		{
			Route::ErrorPage404();
			return false;
		};
		
		$this->model = new Model_Footer();
		$answer = $this->model->getAnswer($_POST["id"], $_POST["answer"]);

		if (!(intval($answer) === intval($_POST["answer"]))) {
			$respond['error'] = true;
			$respond['notanswer'] = true;
			$respond['html'] = '<i class="icon-cancel-circled-1"></i><span>Невірна відповідь на контрольне запитання.<span><span>Спробуйте ще раз.<span>';
			echo json_encode($respond);
			return false;
		};


		$host = HOSTNAME;
		$date = date('d.m.y | H:i');

		$text = htmlspecialchars($_POST["text"]);
		$email = htmlspecialchars($_POST["email"]);
		$name = htmlspecialchars($_POST["name"]);

$msg = <<<END
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html lang="uk">

<head>
   <meta charset="UTF-8">
</head>

<body>
	<table border="0" cellpadding="0" cellspacing="0" width="600" style="margin:0 auto; padding:0;  font: 15px Arial, sans-serif; text-align: center; color:#6a6a6a" bgcolor="#e8f9ff">
		<tr>
			<td colspan="2">
				<img src="http://{$host}/img/mail/mail_header.jpg" alt="" width="600">
			</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2" style="padding: 20px 0"></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="2"><strong>Відвідувач сайту ДЦПТО</strong> ::: <a href="http://{$host}/" style="color: blue; font: 15px Arial, sans-serif; line-height: 30px; -webkit-text-size-adjust:none;" target="_blank">http://$host/</a> залишив запитання.</td>
			<td></td>
		</tr>
		<tr>
			<td style="padding: 20px 0"></td>
		</tr>
		<tr >
			<td style="vertical-align: top; padding: 0 20px; text-align: left; width: 150px; border-right: 1px solid lightgray">
				<strong>Дата:</strong> <br> {$date}<br>
				<strong>Ім'я користувача:</strong> {$name} <br>
				<strong>Пошта користувача:</strong> <br> <a href="mailto:{$email}?subject=Відповідь на Ваше запитання, залишене на сайті ДЦПТО&body=Добрий день, {$name}!" style="color: blue; font: 15px Arial, sans-serif; line-height: 30px; -webkit-text-size-adjust:none;" target="_blank">{$email}</a>
				</td>
			<td style="text-align: left; padding: 0 25px"><strong>Текст запитання: </strong> <br> {$text}</td>
		</tr>
		<tr>
			<td style="padding: 20px 0"></td>
		</tr>
		<tr>
			<td colspan="2" style="font-size: 20px; color: red; font-weight: bold"> ДАЙТЕ ВІДПОВІДЬ В НАЙКОРОТШИЙ ТЕРМІН!</td>
			<td></td>
		</tr>
		<tr>
			<td style="padding: 20px 0"></td>
		</tr>
	</table>
</body>
END;

// $headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		// $headers  = "Content-type: text/html;";
		// $headers .= "From: Сайт ДЦПТО \r\n"; 
		//$headers = "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n"."From: Сайт ДЦПТО\r\n"; 
		$headers = "MIME-Version: 1.0\r\n"."Content-type: text/html;"."From: Сайт ДЦПТО\r\n"; 
		$subject = "=?utf-8?B?". base64_encode("З сайту ДЦПТО користувач надіслав питання!"). "?=";
		// $send = mail(EMAIL, $subject,  $msg, $headers, iconv ('utf-8', 'windows-1251', $headers));
		$send = mail(EMAIL, $subject, $msg, $headers);
		$respond = array();

		if ($send) {
			$respond['error'] = false;
			$respond['html'] = '<i class="icon-ok-circled-1"></i><span>Ваш запит прийнято.<span><span>Ми дамо відповідь в найкоротший термін.<span>';
			$respond['newQuestion'] = $this->model->getQuestion();

		} else {
			$respond['error'] = true;
			$respond['html'] = '<i class="icon-cancel-circled-1"></i><span>Виникли несправності...<span><span>Спробуйте пізніше.<span>';
		}

		echo json_encode($respond);
	}
}
?>