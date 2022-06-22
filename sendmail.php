<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/phpmailer/src/Exception.php';
    require 'phpmailer/phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/phpmailer/language/');
    $mail->IsHTML(true);

    //От кого письмо
    $mail->setFrom('order@spartmebel.ru', 'Заказ');
    //Кому
    $mail->addAddress('order@spartmebel.ru');
    //тема
    $mail->Subject = 'Заказ с сайта';

    //Телефон
    if(trim(!empty(&_POST['tel']))){
        $body.='<p>Телефон: '.$_POST['tel'].'</p>';
    }
    //Имя
    if(trim(!empty(&_POST['name']))){
        $body.='<p>Ф.И.О: '.$_POST['name'].'</p>';
    }
    //Артикул
    if(trim(!empty(&_POST['article']))){
        $body.='<p>Артикул: '.$_POST['article'].'</p>';
    }
    //Адрес
    if(trim(!empty(&_POST['adress']))){
        $body.='<p>Адрес: '.$_POST['adress'].'</p>';
    }

    $mail->Body = $body;

    //Отправка
    if (!$mail->send()) {
        $message = 'Данные отправлены!';
    } else {
        $message = 'Ошибка';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>