PUGXI18nBundle
=============

PUGXI18nBundle is a simple way to manage the internationalization in Symfony2 as in symfony1 with a Entity (that implements TranslatableInterface) and EntityI18n (that implements TranslatingInterface) 
via one-to-many association.

In practice when you design the entity that implements TranslatableInterface, you can extend the class TranslatableWrapper or the class Translatable.

The Translatable's function is retrieve the translation for the current locale. 

The TranslatableWrapper's function is to wrap the methods of the related entity (TranslatingInterface) using a "magic call".
If you want "kill the magic", you have to extend Translatable and implement these wrappers by yourself.

The master branch is in sync with Symfony master branch
The branch 1.0 is developed upon Symfony 2.1

[![Build Status](https://secure.travis-ci.org/PUGX/PUGXI18nBundle.png?branch=master)](http://travis-ci.org/PUGX/PUGXI18nBundle)

[![Total Downloads](https://poser.pugx.org/PUGX/i18n-bundle/downloads.png)](https://packagist.org/packages/PUGX/i18n-bundle)
[![Latest Stable Version](https://poser.pugx.org/PUGX/i18n-bundle/v/stable.png)](https://packagist.org/packages/PUGX/i18n-bundle)
[![Latest Stable Version](https://poser.pugx.org/PUGX/i18n-bundle/v/unstable.png)](https://packagist.org/packages/PUGX/i18n-bundle)

Documentation
-------------

[Read the Documentation](https://github.com/PUGX/PUGXI18nBundle/blob/master/Resources/doc/index.md)

Installation
------------

All the installation instructions are located in [documentation](https://github.com/PUGX/PUGXI18nBundle/blob/master/Resources/doc/index.md).

License
-------

This bundle is under the MIT license. See the complete license in the bundle:

    Resources/meta/LICENSE

About
-----

PUGXI18nBundle is a [PUGX](https://github.com/PUGX) initiative.


Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the [Github issue tracker](https://github.com/PUGX/PUGXI18nBundle/issues).

When reporting a bug, it may be a good idea to reproduce it in a basic project
built using the [Symfony Standard Edition](https://github.com/symfony/symfony-standard)
with PUGXI18nBundle installed, to allow developers of the bundle to reproduce the issue by simply cloning it
and following some steps.
