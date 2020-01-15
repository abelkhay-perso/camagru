<?php
function send_verification_email($toAddr, $toUsername, $flag, $ip) {
  $subject = "[CAMAGRU] - Email verification";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <camagru@42.fr>' . "\r\n";
  $message = '
    <html>
        <head>
        <title>' . $subject . '</title>
        </head>
        <body>
        Hello ' . htmlspecialchars($toUsername) . ' </br>
        To finalyze your subscribtion please click the link below </br>
        <a href="http://' . $ip . '/verify.php?flag=' . $flag . '">Verify my email</a>
        </body>
    </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}

function send_forget_mail($toAddr, $toUsername, $password) {
  $subject = "[CAMAGRU] - Reset your password";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <camagru@42.fr>' . "\r\n";
  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      Your new password is : ' . $password . ' </br>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}

function send_comment_mail($toAddr, $toUsername, $comment) {
  $subject = "[CAMAGRU] - New Comment";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <camagru@42.fr>' . "\r\n";
  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      Their is a new comment on one of your photos  : "' . $comment . '" </br>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}
?>