# Fuel SendGrid Package

A super simple SendGrid package for the SendGrid PHP SDK for Fuel.

## About
* Version: 1.0.0
* License: MIT License
* Author: Derek Myers

## Installation

Simply add the following to your composer.json require block:

	'sendgrid/sendgrid'

### Git Submodule

If you are installing this as a submodule (recommended) in your git repo root, run this command:

	$ git submodule add git://github.com/dmyers/fuel-sendgrid.git fuel/packages/sendgrid

Then you you need to initialize and update the submodule:

	$ git submodule update --init --recursive fuel/packages/sendgrid/

### Download

Alternatively you can download it and extract it into `fuel/packages/sendgrid/`.

## Configuration

Configuration is easy. First thing you will need to do is to [signup with SendGrid](http://sendgrid.com) (if you haven't already).

Next, copy the `config/sendgrid.php` from the package up into your `app/config/` directory. Open it up and enter your API keys.

## Usage

```php
$sendgrid = Sendgrid::instance();
$mail = SendGrid_Mail::forge();

$mail->addTo('ives@apple.com')
	->setSubject('The Future')
	->setHtml('<h1>Lorem Ipsum</h1>');

$sendgrid->send($mail);
```

For more examples, check out the [Sendgrid PHP SDK](https://github.com/sendgrid/sendgrid-php).

## Updates

In order to keep the package up to date simply run:

	$ git submodule update --recursive fuel/packages/sendgrid/
