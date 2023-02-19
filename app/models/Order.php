<?php

namespace app\models;

use core\App;
use core\Db;
use PHPMailer\PHPMailer\PHPMailer;

class Order extends AppModel
{
    public static function saveOrder($data): int|false
    {
        Db::begin();
        try {
            $params = [
                'user_id' => $data['user_id'],
                'note' => $data['note'],
                'total' => $_SESSION['cart.sum'],
            ];
            Db::query("INSERT INTO orders (user_id, note, total) VALUE (:user_id, :note, :total)", $params);
            $order_id = Db::lastId();
            self::saveOrderProduct($order_id);

            Db::commit();
            return $order_id;
        } catch (\Exception $e) {
            Db::rollback();
            return false;
        }
    }

    public static function saveOrderProduct($order_id)
    {
        foreach ($_SESSION['cart'] as $product_id => $product) {
            $params = [
                'order_id' => $order_id,
                'product_id' => $product_id,
                'title' => $product['title'],
                'price' => $product['price'],
                'sum' => $product['price'],
            ];
            Db::query("INSERT INTO order_product (order_id, product_id, title, price, sum) VALUE (:order_id, :product_id, :title, :price, :sum)", $params);
        }
    }

    public static function mailOrder($order_id, $user_email, $tpl)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->SMTPDebug = 3;
            $mail->CharSet = 'UTF-8';
            $mail->Host = App::$app->getProperty('smtp_host');
            $mail->SMTPAuth = App::$app->getProperty('smtp_auth');
            $mail->Username = App::$app->getProperty('smtp_username');
            $mail->Password = App::$app->getProperty('smtp_password');
            $mail->SMTPSecure = App::$app->getProperty('smtp_secure');
            $mail->Port = App::$app->getProperty('smtp_port');
            $mail->isHTML(true);

            $mail->setFrom(App::$app->getProperty('smtp_from_email'), App::$app->getProperty('site_name'));
            $mail->addAddress($user_email);

            ob_start();
            require \APP . "/views/mail/{$tpl}.php";
            $body = ob_get_clean();

            $mail->Body = $body;
            return $mail->send();
        } catch (\Exception $e) {
            // debug($e, 1)
            return false;
        }
    }
}
