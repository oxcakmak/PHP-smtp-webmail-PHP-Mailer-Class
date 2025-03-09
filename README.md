# PHP-smtp-webmail-PHP-Mailer-Class
A PHP email sending implementation using PHPMailer library version 5.2.4. This implementation provides a robust way to send emails through SMTP with support for HTML content, attachments, and various security features.
Sending mail with smtp and webmail in PHP / PHP Mailer Class.

## Support Me

This software is developed during my free time and I will be glad if somebody will support me.

Everyone's time should be valuable, so please consider donating.

[https://buymeacoffee.com/oxcakmak](https://buymeacoffee.com/oxcakmak)

## Table of Contents
- [Features](#features)
- [Requirements](#requirements)
- [Basic Usage](#basic-usage)
- [Advanced Features](#advanced-features)
  - [Adding Attachments](#adding-attachments)
  - [Adding CC and BCC](#adding-cc-and-bcc)
  - [Adding Embedded Images](#adding-embedded-images)
  - [DKIM Signing](#dkim-signing)
- [Error Handling](#error-handling)
- [Debugging](#debugging)
- [Security Considerations](#security-considerations)
- [Known Limitations](#known-limitations)
- [Troubleshooting](#troubleshooting)
- [License](#license)
- [Credits](#credits)

## Features

- SMTP email sending
- HTML and plain text email support
- File attachments support
- CC and BCC recipients
- DKIM signing capability
- Multiple character set support
- Error handling and debugging
- Custom headers support
- Embedded images in HTML
- VERP support
- Multiple protocols (mail, sendmail, smtp)

## Requirements

- PHP 5.0 or higher
- SMTP server access
- SSL/TLS support for secure connections
- Required PHP extensions:
  - openssl
  - pdo
  - mbstring

## Basic Usage

```php
require_once __DIR__ . '/smtpmailer.php';

$mail = new SmtpMailer();

// Configure SMTP settings
$mail->IsSMTP();
$mail->Host = 'your.smtp.server';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // or 'tls'
$mail->Port = 465; // or 587 for TLS
$mail->Username = 'your_username';
$mail->Password = 'your_password';

// Set email content
$mail->IsHTML(true);
$mail->CharSet = 'utf-8';
$mail->From = 'sender@example.com';
$mail->FromName = 'Sender Name';
$mail->AddAddress('recipient@example.com');
$mail->Subject = 'Email Subject';
$mail->Body = 'HTML message body';
$mail->AltBody = 'Plain text message body';

// Send email
if($mail->Send()) {
    echo "Email sent successfully";
} else {
    echo "Email sending failed: " . $mail->ErrorInfo;
}
```

## Advanced Features

### Adding Attachments

```php
$mail->AddAttachment('path/to/file.pdf', 'filename.pdf');
```

### Adding CC and BCC

```php
$mail->AddCC('cc@example.com');
$mail->AddBCC('bcc@example.com');
```

### Adding Embedded Images

```php
$mail->AddEmbeddedImage('path/to/image.jpg', 'image_cid');
$mail->Body = 'Embedded image: <img src="cid:image_cid">';
```

### DKIM Signing

```php
$mail->DKIM_domain = 'example.com';
$mail->DKIM_private = 'path/to/private.key';
$mail->DKIM_selector = 'selector';
$mail->DKIM_passphrase = '';
```

## Error Handling

The library includes comprehensive error handling:

```php
try {
    if(!$mail->Send()) {
        echo "Error: " . $mail->ErrorInfo;
    }
} catch (phpmailerException $e) {
    echo "Error: " . $e->errorMessage();
}
```

## Debugging

Enable debugging for troubleshooting:

```php
$mail->SMTPDebug = 1; // 0 = off, 1 = client messages, 2 = client and server messages
```

## Security Considerations

- Always use SMTPSecure with SSL/TLS when possible
- Keep credentials secure and never commit them to version control
- Validate email addresses before sending
- Use appropriate error handling
- Keep PHPMailer updated to the latest version
- Implement rate limiting if sending bulk emails

## Known Limitations

- Some features require PHP 5.3 or higher
- SMTP connections might be blocked by firewalls
- File attachment size limitations based on PHP settings
- Some email clients might handle HTML emails differently

## Troubleshooting

Common issues and solutions:

1. Connection failed
   - Check SMTP credentials
   - Verify port numbers
   - Ensure SSL/TLS settings match server requirements

2. Authentication failed
   - Verify username and password
   - Check if SMTP authentication is required

3. Timeout issues
   - Adjust SMTP timeout settings
   - Check server response time

## License

This implementation uses PHPMailer which is distributed under the LGPL license.

## Credits

Based on PHPMailer:
- Version: 5.2.4
- Original Authors: Andy Prevost, Marcus Bointon
- Current Maintainer: Jim Jagielski
- Project: https://code.google.com/a/apache-extras.org/p/phpmailer/
