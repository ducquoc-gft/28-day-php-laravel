28 day PHP Laravel
==========

Learning journey with PHP programming language - and with Laravel framework.

Some tips for beginners/novices as a "cheat sheet" to learn quicker.
Mostly language features & stdlib up to PHP 8 release (2020 Nov), though 8.2+ is recommended.

### Usage

**Basic Usage**

For PHP beginners, you may try copy the PHP files in "d1..." folders to Apache/nginx public htdocs (www) folder, then try accessing via browser.

```bash
  $ ln -sf $(pwd .)/d1-apache-htdocs $XAMPP_HOME/htdocs/php5
```

There are sub directories of root directory, which are Laravel projects. You may try to run one of the sample projects, given `php` and `composer` has been installed on your machine.

### Samples
```bash
  $ cd example-app
  $ cat config/app.php
```

#### Running samples

```
  $ php artisan serve
```

The application will be accessible (to browsers) at `http://localhost:8000` by default.

Alternative: The traditional way is to copy those Laravel folders into Apache/nginx htdocs (www) directory, and try running Apache/nginx then access it via browser (typically `http://localhost/`example-app or /example-app/public if not modified VirtualHost).

#### Misc 

Quick PHP History: 
```
  + 1994 Rasmus Lerdorf: "Personal Home Page"
  + 1997 PHP 3 "PHP: Hypertext Processor"
  + 2000 PHP 4
  + 2004 PHP 5 OOP support, PDO, performance optimization, ternary shortcut `?:` elvis
  + 2015 PHP 7 OOP more, type declarations, `??` (null coalesce) operator, anonymous classes
  + 2020 PHP 8 Named arguments, `?->` (null safe) operator, union types, annotations (attributes), constructor property, `match` expression, static return type, mixed types, throw expression, trailing comma in parameter lists, ::class get_class(), Stringable and trait improvement, Concatenation precedence
```

#### References

https://gitlab.com/ducquoc/28-day-php-laravel

https://github.com/ducquoc/55-day-flutter-dart-be

https://bitbucket.org/ducquoc/dq-training

https://www.tutorialspoint.com/php/php_syntax_overview.htm

https://laravel.com/docs/11.x/installation#creating-a-laravel-project

https://laracasts.com/series/30-days-to-learn-laravel-11
