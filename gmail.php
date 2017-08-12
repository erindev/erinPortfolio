<?php
header("Content-type:text/html; charset=utf-8");

date_default_timezone_set('Asia/Seoul');

include "./PHPMailerAutoload.php"; // error 받고 싶으면 required 대신에 include

//PARAMETER
$sender_name = $_POST['name'];
$sender_title = $_POST['title'];
$sender_email = $_POST['email'];
$sender_content = $_POST['editor1'];

//메일 발송 기능 초기화
$mail = new PHPMailer;

//SMTP를 사용했다고 PHPMailer에게 전달
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.naver.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587(tls) for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls(보안문제있음:리눅스 공부해야함)
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail //관리자계정넣기
$mail->Username = "yjprogrammar@naver.com";

//Password to use for SMTP authentication
$mail->Password = "kang1142002"; // 44번 계정 실제비밀번호쓰기

//Set who the message is to be sent from : 보내는 사람 정보
$mail->setFrom('yjprogrammar@naver.com', $sender_name );

//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to : 받는 사람 정보
$mail->addAddress('yjprogrammar@naver.com', '강연주(Erin Kang)');

//Set the subject line
$mail->isHTML(true);
$mail->Subject = $sender_title;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
/*
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
*/

//Replace the plain text body with one created manually
$mail->Body = $sender_content;
$mail -> charSet = "UTF-8";
//Attach an image file
/*
$mail->addAttachment('images/phpmailer_mini.png');
*/

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo; exit();
} else {
    echo "<script>메일이 성공적으로 발송되었습니다.</script>";
}

echo "<meta http-equiv:'refresh'; content='0; url=./final.html'>";