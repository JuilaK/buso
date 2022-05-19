<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/Exception.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    //От кого письмо
    $mail->setFrom('offerspb@mail.ru', 'BUSO. скупка оборудования');
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

    //Отправка
    if (!$mail->send()){
        $message = 'Ошибка отправки данных формы';
    } else {
        $message = 'Данные отправлены!';
    }

    $response = ['message => $message'];
    header('Content-type: application/json');
    echo json_encode($response);
?>
