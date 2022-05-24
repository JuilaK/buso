<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';
    require 'phpmailer/src/Exception.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                   
        $mail->Host   = 'smtp.mail.ru';  
        $mail->SMTPAuth   = true;          
        $mail->Username   = 'buso12345@mail.ru';       
        //$mail->Password   = 'YRsr_2AYpot3';  
        $mail->Password   = 'R5wy3NeQVMbTRZKHm0As';  
        $mail->SMTPSecure = 'ssl';         
        $mail->Port   = 465;

        $mail->CharSet = 'UTF-8';
        $mail->setLanguage('ru', 'phpmailer/language/');
        $mail->IsHTML(true);
    
        //От кого письмо
        $mail->setFrom('buso12345@mail.ru', 'BUSO. Cкупка оборудования');
        //Кому отправить
        $mail->addAddress('kbazya@mail.ru');
        //Тема письма
        $mail->Subject = 'Новая заявка - busospb.ru';
    
        //Тело письма
        $body = '<h1>Новая заявка busospb.ru</h1>';
    
        if(trim(!empty($_POST['name']))){
            $body.= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
        }
    
        if(trim(!empty($_POST['email']))){
            $body.= '<p><strong>Электронная почта:</strong> '.$_POST['email'].'</p>';
        }
    
        if(trim(!empty($_POST['phone']))){
            $body.= '<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
        }
    
        if(trim(!empty($_POST['message']))){
            $body.= '<p><strong>Комментарий:</strong> '.$_POST['message'].'</p>';
        }
    
        $mail->Body = $body;
        $mail->send();
        echo 'Данные отправлены!';
    } catch (Exception $e) {
        echo "Данные не могут быть отправлены. Ошибка: {$mail->ErrorInfo}";
    }
?>
