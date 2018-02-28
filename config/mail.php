<?php
//SEND EMAIL VIA PHP MAILER
//Turned on 11/17/2016.
return array(
    "driver" => "mail",
    "host" => "null",
    "port" => null,
    "from" => array(
        "address" => "do_not_reply@ncsu.com",
        "name" => "Guest Reservation - Coastal Quarters"
    ),
    "username" => "null",
    "password" => "null",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);

//TESTING E-MAIL ACCOUNT
//LIVE AS OF 10-18-2016
/*
return array(
    "driver" => "smtp",
    "host" => "mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    "username" => "XXXXXXXXXXXX",
    "password" => "XXXXXXXXXXXX",
    "sendmail" => "/usr/sbin/sendmail -bs",
    "pretend" => false
);*/
