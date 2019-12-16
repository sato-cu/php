<?php

	mb_language("japanese");
	mb_internal_encoding("UTF-8");

	//ソースを全て読み込ませる
	//パスはPHPMailerをインストールした場所
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';
	require 'PHPMailer/src/POP3.php';
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/OAuth.php';
	require 'PHPMailer/language/phpmailer.lang-ja.php';

	//公式のフォーマット
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	//SMTPの設定 mail Server settings
	$mailer = new PHPMailer(); //インスタンス生成
	$mailer->IsSMTP(); //SMTPを作成
	$mailer->Host = 'smtp.gmail.com'; //Gmailの環境に合わせる
	$mailer->CharSet = 'utf-8';//文字セット
	$mailer->SMTPAuth = TRUE; //SMTP認証を有効にする
	$mailer->Username = 'hogehoge@gmail.com';  //ui Gmailのユーザ名
	$mailer->Password = 'hogehoge'; // GmailのPW
	$mailer->SMTPSecure = 'ssl'; //TLS or SSLを指定
	$mailer->Port = 465; //TLSは587, SSLは465, SSL/TLSなしは25
	//$mailer->SMTPDebug = 2; //2は詳細デバッグ 1は簡易デバッグ 不要な場合コメントアウト

	//contact.tplのchexboxで取得した 配列の値を宛先にセット
	for ($i = 0; $i < count(@$_POST["to"]); $i++){
		$mailer->addAddress($_POST["to"][$i]);
	}

	//メール文言
	$message="こんにちは。多摩CS改善活動です。"."\n".
	         "問い合わせが来ています。以下リンク先を確認し回答をお願いします。"."\n"."\n".
	         "http://localhost/phpmyfaq/index.php?action=open"."\n"."\n".
	         "※URLが確認できない場合は、お手数ですが本メールの返信にて回答をお願いします。"."\n".
	         "※※※問い合わせ内容ここから"."\n"."\n".
	         $_POST['message01'];
	         
	$mailer->From     = 'XXXXXXX@gmail.com'; //差出人の設定
	$mailer->FromName = mb_convert_encoding("多摩CS改善活動FAQ","UTF-8","AUTO"); //表示名おまじない付
	$mailer->Subject  = mb_convert_encoding($_POST['subject'],"UTF-8","AUTO"); //件名の設定
	$mailer->Body     = mb_convert_encoding($message,"UTF-8","AUTO"); //メッセージ本体
	//$mailer->AddAddress($_POST['to']); // To宛先

	//送信する
	if($mailer->Send()){
		echo "担当者へメールを送信しました。<br /><br />";
		echo "***********問い合わせ先***********<br />";
			for ($i = 0; $i < count(@$_POST["to"]); $i++){
	  			echo @$_POST["to"][$i]."　";
	  			echo "<br />";
			}
	}else{
	    echo "送信に失敗しました" . $mailer->ErrorInfo;
	}

?>
