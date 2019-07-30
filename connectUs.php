<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


////////////////////////////////////////////

  if(isset($_POST['name'],$_POST['clinic'],$_POST['phone'],$_POST['email'],$_POST['text'])){
    //姓名
    if(empty($_POST['name'])){
      $errors[] = "請輸入姓名";
    }else{
      $name = htmlentities($_POST['name']);
      $name = mb_convert_encoding($name,"big5","utf-8");
    }
    //診所名稱
    if(empty($_POST['clinic'])){
      $errors[] = "請輸入診所名稱.";
    }else{
      $clinic = htmlentities($_POST['clinic']);
      $clinic = mb_convert_encoding($clinic,"big5","utf-8");
    }
    //聯絡電話
    if(empty($_POST['phone'])){
      $errors[] = "請輸入聯絡電話.";
    }else{
      $phone = htmlentities($_POST['phone']);
      $phone = mb_convert_encoding($phone,"big5","utf-8");
    }
    //信箱
    if (empty($_POST['email'])) {
      $errors[] = "請輸入Email.";
    }elseif (strlen($_POST['email']) > 347) {
      $errors[] = "您的Email過長";
    }elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
      $errors[] = "請輸入有效Email";
    }else{
      $sender =htmlentities($_POST['email']);
      $sender = mb_convert_encoding($sender,"big5","utf-8");
    }
    //內容
    $text = htmlentities($_POST['text']);
    $text= mb_convert_encoding($text,"big5","utf-8");

    
  }

?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121892188-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121892188-1');
</script>

  <meta charset="utf-8">
  
<!-- <link rel="stylesheet" type="text/css" href="css/reset.css"> -->
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/connectUs.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>凌醫科技|聯絡我們</title>
  


</head>
<body>

  <div class="main-bg"> 

    </div>


<div class="wrapper">
  
   <!--  <div class="main-bg"> 

    </div> -->

<!-- start header -->

<header class="navbar">
  <div class="container">
    <div class="elements">
      <div class="logo"><img src="images/zeromed-logo.png" alt=""></div>
      <div class="menu">
        <!-- <ul class=""> -->
        <div class="icon">
          <div class="button">
            <a href="index.html"><img src="images/homeIcon.png"></a>
            
            <span>首頁</span>
          </div>
          <div class="button">
            
            <a href="/blog"><img src="images/blog.png"></a>
            <span>醫管撇步</span>
            
          </div>
          <!-- <div class="button">
            
            <a href="tutorial.html"><img src="images/vedioIcon.png"></a>
            <span>影片</span>
          </div> -->
          <div class="button">
            <a href="connectUs.php"><img src="images/connectUs.png"></a>
            <span id="current"></span>
            <span>聯絡我們</span>
          </div>  
          <div class="button">  
            
            <a href="http://www.weightobserver.com.tw" target="_blank"><img src="images/systemIcon.png"></a>
            <span>進入系統</span>
          </div>
        </div>
        <!-- </ul> -->
      </div>
    </div>
  </div>  
</header>

<div class="runner">
  <marquee><font color="#FF4D71" style="font-size: 18px;line-height: 20px;">愛半月科技(股)公司 將於 8/1 正式更名為【 凌醫科技顧問股份有限公司 】，請大家繼續支持愛用。</font></marquee>
</div>
<!-- end header -->

<!-- start formTable -->
<div class="formTable">
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-xs-12 col-md-6">
        <div class="elements">


<!-- start php insert -->
          
<?php
  if(empty($errors) === false){
?>
<ul>
    <?php
      foreach ($errors as $error) {
        echo "<li>" , $error, "</li>";
      }
    ?>
  </ul>
  <?php
    }else{
      if(isset($name,$clinic,$phone,$sender)){


            

            //Load Composer's autoloader
            require 'vendor/autoload.php';


            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 1;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'beta0221@gmail.com';                 // SMTP username
                $mail->Password = 'mrkvusglegtdovzf';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('beta0221@gmail.com');
                //$mail->addAddress('beta0221@gmail.com', $iantifat);     // Add a recipient
                $mail->addAddress('beta0221@gmail.com');            // Name is optional
                //$mail->addReplyTo($sender, $name );
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $title;
                $mail->Body    = $aa . $name . '<br>' . $bb . $clinic . '<br>' . $cc .  $phone  . '<br>' . $dd . '<br>'. $text;
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            

      }
    }
  ?>



<!-- end php insert -->

                <form class="form" id="form1" action="" method="post" enctype="text">
            
                    <p class="name">
                      <input name="name" type="text" class="feedback-input" placeholder="姓名" id="name" />
                    </p>

                    <p class="clinic">
                      <input name="clinic" type="text" class="feedback-input" placeholder="診所名稱" id="clinic" />
                    </p>

                    <p class="phone">
                      <input name="phone" type="text" class="feedback-input" placeholder="聯絡電話" id="phone" />
                    </p>

                    <p class="email">
                      <input name="email" type="text" class="feedback-input" id="email" placeholder="信箱" />
                    </p>
                    
                    <p class="text">
                      <textarea name="text" class="feedback-input" id="comment" placeholder="內容"></textarea>
                    </p>
                    
                    
                    <div class="submit">

                      <input type="submit" value="送出" id="button-blue"/>
                       <div class="ease"></div>
                    </div>
               </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>

<!-- end formTable -->


<!-- start footer -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="elements">
          <div class="logo"><img src="images/zeromed-logo.png" alt=""></div>
        </div>
      </div>
      <div class=" col-lg-9 col-md-9 col-sm-6 col-xs-12">
        <div class="col-lg-4 col-md-4">
          <div class="elements">
            <p>地址：</p>
            <p>中壢區忠孝路256號二樓</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="elements">
            <p>Email：</p>
            <p>zeromed1070705@gmail.com</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="elements">
            <p>服務專線 : </p>
            <p>03-463-6913</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
</footer>
<!-- end footer -->



</div>
</body>
</html>

