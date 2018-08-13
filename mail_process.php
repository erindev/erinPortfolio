<?php  
	header("Content-type:text/html; charset=utf-8"); 
    /**  PHPMailer include  */
	date_default_timezone_set('Asia/Seoul');
	include    './PHPMailerAutoload.php';
    /**  PARAMETER  */
	$sender_name = $_POST['name'];  
	$sender_title = $_POST['title'];		 
	$sender_content = $_POST['content']; 
    /** 메일 발송 기능 초기화 */
	$mail = new PHPMailer;
	# $mail->CharSet = 'utf-8'; /// 언어셋 설정
	# $mail->Encoding = 'base64'; /// 인코딩 방법 정의
	$mail->CharSet = "EUC-KR";
	$mail->Encoding = "base64";
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Host = 'smtp.naver.com';    ////
	$mail->Port = 465;  ////
	$mail->SMTPSecure = 'ssl';  ////
	$mail->SMTPAuth = true;
	$mail->Username ="yjprogrammar@naver.com";		 //// 관리자 naver 아이디
	$mail->Password = "Erin1142002!";	 //// 관리자 naver 비밀번호
	$mail->setFrom('yjprogrammar@naver.com',  $sender_name  );    ////보내는 사람정보
	$mail->addAddress('yjprogrammar@naver.com', 'admin'); ////받는 사람정보
	$mail->isHTML(true);   //// Set email format to HTML
	$mail->Subject = $sender_title  ;  ////제목
	$mail->Body = $sender_content  ; ////내용
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;    exit();  ////
	} else {
		echo "<script>alert('메일을 보냈습니다.'); </script>";  ////
			echo "<meta http-equiv='Refresh'   content='0; url=./index.html' >";  ////
	}

?>
