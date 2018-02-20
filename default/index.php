<?php
use google\appengine\api\mail\Message;
$image_content_id = '<image-content-id>';
// Pull in the raw file data of the image file to attach it to the message.
$image_data = file_get_contents('image.jpg');
try {
    $message = new Message();
    $message->setSender('ahish@turnkey-citadel-195504.appspotmail.com');
    echo 'Mail Sent';
    $message->addTo('ahishnagaraj@gmail.com');
    $message->setSubject('Example email');
    $message->setTextBody('Hello, world!');
    $message->addAttachment('image.jpg', $image_data, $image_content_id);
    $message->send();
    echo 'Mail Sent';
} catch (InvalidArgumentException $e) {
    echo 'There was an error';
}?>