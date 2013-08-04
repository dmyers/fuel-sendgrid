# Fuel SendGrid Package

A super simple SendGrid package for the SendGrid PHP SDK for Fuel.

## About
* Version: 1.0.0
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

## Updates

In order to keep the package up to date simply run:

	$ git submodule update --recursive fuel/packages/sendgrid/