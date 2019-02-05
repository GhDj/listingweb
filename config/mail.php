<?php

return [
   'driver' => env('MAIL_DRIVER', 'smtp'),
   'host' => env('MAIL_HOST', 'auth.smtp.1and1.fr'),
   'port' => env('MAIL_PORT', 587),
   'from' => ['address' => 'noreply@counsellme.com', 'name' => 'NoReply@counsellme.com'],
   'encryption' => env('MAIL_ENCRYPTION', 'tls'),
   'username' => env('MAIL_USERNAME', 'noreply@counsellme.com'),
   'password' => env('MAIL_PASSWORD', 'counsellme_admin'),
   'sendmail' => '/usr/sbin/sendmail -bs',
   'pretend' => false,

   'stream' => [
       'ssl' => [
           'allow_self_signed' => true,
           'verify_peer' => false,
           'verify_peer_name' => false,
       ],
       ],
];
