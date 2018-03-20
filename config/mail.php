<?php
return array(
    "driver" => env('MAIL_DRIVER','log'),
    "host" => env('MAIL_HOST','smtp.mailgun.org'),
    "port" => env('MAIL_PORT',587),
    "from" => array(
        "address" => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        "name" => env('MAIL_FROM_NAME','Example')
    ),
    "username" => env('MAIL_USERNAME'),
    "password" => env('MAIL_PASSWORD'),
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);

