<?php
require __DIR__ . '/vendor/autoload.php';

// event params
$summary = 'Summary of the event';
$venue = 'Simbawanga';
$start = '20140820';
$start_time = '160630';
$end = '20140820';
$end_time = '180630';
$event_id   = date('Ymd').'T'.date('His')."-".rand();
$sequence = 0;
$status = 'TENTATIVE';
$event['description']   = 'read';

$email  = 'emarjay921@gmail.com';
$yahoo  = 'smtp.mail.yahoo.com';
$google = 'smtp.gmail.com';
$ymail  = 'j.emmanuel17@ymail.com';


//PHPMailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = $yahoo;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = $ymail;
$mail->Password = 'jlogan16@';
$mail->isHtml(false);
$mail->setFrom($ymail, 'emarjay');
$mail->addReplyTo($ymail, 'Water Melon');
$mail->addAddress($ymail,'re Addy');
$mail->addAddress($email,'sed Addy');
$mail->addAddress('zaihunter45@gmail.com','Recipient Addy');
$mail->addAddress('kolakolade@gmail.com','K. Koldae');
$mail->ContentType = 'text/html';

$mail->Subject = "test";
$mail->addCustomHeader('MIME-version',"1.0");
$mail->addCustomHeader('Content-type',"text/calendar; method=REQUEST; charset=UTF-8");
$mail->addCustomHeader('Content-Transfer-Encoding',"7bit");
$mail->addCustomHeader('X-Mailer',"Microsoft Office Outlook 12.0");
$mail->addCustomHeader("Content-class: urn:content-classes:calendarmessage");

$ical = "BEGIN:VCALENDAR\r\n";
$ical .= "VERSION:2.0\r\n";
$ical .= "PRODID:-//ChambersLegal//EmailClient//EN\r\n";
$ical .= "METHOD:REQUEST\r\n";
$ical .= "BEGIN:VEVENT\r\n";
$ical .= "ORGANIZER;CN=Joseph Kolade:MAILTO:emarjay921@gmail.com\r\n";
$ical .= "ATTENDEE;CN=zaihunter45@gmail.com;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE:mailto:zaihunter45@gmail.com\r\n";
$ical .= "ATTENDEE;CN=emarjay921@gmail.com;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE:mailto:emarjay921@gmail.com\r\n";
$ical .= "ATTENDEE;CN=kolakolade@gmail.com;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE:mailto:kolakolade@gmail.com\r\n";
$ical .= "UID:".strtoupper(md5($event_id))."-kaserver.com\r\n";
$ical .= "SEQUENCE:".$sequence."\r\n";
$ical .= "STATUS:".$status."\r\n";
$ical .= "DTSTAMPTZID=Africa/Nairobi:".date('Ymd').'T'.date('His')."\r\n";
$ical .= "DTSTART:".$start."T".$start_time."\r\n";
$ical .= "DTEND:".$end."T".$end_time."\r\n";
$ical .= "LOCATION:".$venue."\r\n";
$ical .= "SUMMARY:".$summary."\r\n";
$ical .= "DESCRIPTION:".$event['description']."\r\n";
$ical .= "BEGIN:VALARM\r\n";
$ical .= "TRIGGER:-PT15M\r\n";
$ical .= "ACTION:DISPLAY\r\n";
$ical .= "END:VALARM\r\n";
$ical .= "END:VEVENT\r\n";
$ical .= "END:VCALENDAR\r\n";

/*
$message = "<html>\n";
$message .= "<body>\n";
$message .= '<p>Here is my HTML Email / Used for Meeting Description</p>';
$message .= "</body>\n";
$message .= "</html>\n";*/

$mail->Body = /*$message.*/ $ical;

echo "<pre>";
var_dump( $mail->send(), $mail->ErrorInfo );
