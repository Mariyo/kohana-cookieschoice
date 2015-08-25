# Kohana Cookie law module
A simple Kohana [Cookie law](http://www.cookielaw.org/the-cookie-law/) module.

## Usage
Add module to your application modules in **bootstrap.php**:

```php
Kohana::modules(array(
	'cookieschoice' => DOCROOT . 'vendor/mariyo/kohana-cookieschoice',
));
```

and in your template call method **render**:
```php
Cookieschoice::render('default');
```

## Installation

The best way to install module is to use [Composer](https://getcomposer.org/).