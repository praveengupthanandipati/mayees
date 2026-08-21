<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// Strip line breaks from anything that ends up in a mail header, to block
// header injection via the name/email/subject fields.
function ctCleanHeaderValue($value) {
    return trim(preg_replace('/[\r\n]+/', ' ', (string) $value));
}

$name = ctCleanHeaderValue($_POST['name'] ?? '');
$phone = ctCleanHeaderValue($_POST['phone'] ?? '');
$email = ctCleanHeaderValue($_POST['email'] ?? '');
$subject = ctCleanHeaderValue($_POST['subject'] ?? '');
$message = trim((string) ($_POST['message'] ?? ''));
$honeypot = trim((string) ($_POST['website'] ?? ''));

// Honeypot field: real visitors never fill this in. Pretend success so bots
// don't learn to look for a different signal, but skip sending mail.
if ($honeypot !== '') {
    echo json_encode(['success' => true, 'message' => 'Thanks! Your message has been sent.']);
    exit;
}

$errors = [];
if (mb_strlen($name) < 2) {
    $errors['name'] = 'Please enter your full name.';
}
if (!preg_match('/^[6-9]\d{9}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid 10-digit mobile number.';
}
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
}
if (mb_strlen($message) < 5) {
    $errors['message'] = 'Please enter a short message.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'errors' => $errors, 'message' => 'Please fix the highlighted fields and try again.']);
    exit;
}

$to = 'praveennandipati@gmail.com';
$mailSubject = 'Mayees Boutique Contact Form: ' . ($subject !== '' ? $subject : 'New Message From ' . $name);

$bodyLines = [
    'New message from the Mayees Boutique contact form.',
    '',
    'Name: ' . $name,
    'Phone: ' . $phone,
];
if ($email !== '') {
    $bodyLines[] = 'Email: ' . $email;
}
if ($subject !== '') {
    $bodyLines[] = 'Subject: ' . $subject;
}
$bodyLines[] = '';
$bodyLines[] = 'Message:';
$bodyLines[] = $message;
$body = implode("\r\n", $bodyLines);

$headers = [
    'From: Mayees Boutique Website <no-reply@mayees.com>',
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8',
];
if ($email !== '') {
    $headers[] = 'Reply-To: ' . $email;
}

$sent = @mail($to, $mailSubject, $body, implode("\r\n", $headers));

if ($sent) {
    echo json_encode(['success' => true, 'message' => 'Thanks! Your message has been sent — we\'ll get back to you shortly.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, something went wrong sending your message. Please try again or reach us at info@mayees.com.']);
}
