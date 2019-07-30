<?php
require 'phpmailer/PHPMailerAutoload.php';

            $mail = new PHPMailer;
            $mail->CharSet = "big5";
            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                 //設定SMTP需要驗證 
            $mail->Username = 'kingpork80390254@gmail.com';               //設定驗證帳號 
            $mail->Password = 'dlvgkzjuafgkmprm';                //設定驗證密碼
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                  ///設定SMTP埠位，預設為25埠

            $mail->setFrom('kingpork80390254@gmail.com', '零醫科技-網站留言' );   //設定寄件者信箱
            $iantifat= mb_convert_encoding("愛半月科技","big5","utf-8");
            $mail->addAddress('beta0221@gmail.com', $iantifat);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo($sender, $name );     //回信
            //$mail->addCC('cc@example.com');       //副本
            //$mail->addBCC('bcc@example.com');
            
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //附件
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $title= mb_convert_encoding("愛半月官方網站訪客來信","big5","utf-8");
            $aa= mb_convert_encoding("姓名　　：","big5","utf-8");
            $bb= mb_convert_encoding("診所名稱：","big5","utf-8");
            $cc= mb_convert_encoding("聯絡電話：","big5","utf-8");
            $dd= mb_convert_encoding("內容　　：","big5","utf-8");
            $text = ereg_replace("\n", "<br>\n" , $text );
            $mail->Subject = $title;
            $mail->Body    = $aa . $name . '<br>' . $bb . $clinic . '<br>' . $cc .  $phone  . '<br>' . $dd . '<br>'. $text;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                echo '訊息未送。';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo '訊息已傳送。';
            }