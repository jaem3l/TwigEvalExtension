TwigEvalExtension
=================

One of the goals of twig is to limit the amount of logic in your templates.
Unfortunately you won't be able to do all sorts of stuff you can do with PHP.
To regain that power you can use TwigEvalExtension. Just write your php code
inside an `eval()` template function and it gets passed to PHP's eval and you
will get the result.

Installation
------------

You can install the extension by using composer require.

Example Usage
-------------

Using the eval function:
```twig
{{ eval('echo 1+1;') }}
```

Tests
-----

Just run

```bash
$ vendor/bin/phpunit tests/EvalExtensionTest.php
```

No pesky phpunit.xml needed.

Contribution
------------

Please don't.

Known Issues
------------

It's eval in your templates. What could possibly go wrong?!
