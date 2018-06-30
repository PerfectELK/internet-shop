<?
session_start();
require ('../model/ShopUnitModel.php');

$order_arr = ShopUnit::order();

$price = $order_arr[1];
$names = $order_arr[0];

$prepare = $db->prepare("INSERT INTO orders (units,price) VALUES (?,?)");
$execute = $prepare->execute([$names,$price]);

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'phpsendmailfor@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = '1q2w3e4r5t'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                   // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('phpsendmailfor@mail.ru'); // от кого будет уходить письмо?
$mail->addAddress('phpsendmailfor@mail.ru');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Был оформлен заказ Internet-shop';
$mail->Body    =  'Был оформлен заказ на сумму ' . $price . 'рублей <br />' .'Были куплены следующие товары'. "$names";
$mail->AltBody = '';
$mail->send();
unset($_SESSION['units']);
?>