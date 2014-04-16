PUGXI18nBundle Documentation
==================================

## Prerequisites

This version of the bundle is in sync with Symfony master branch

## Installation

1. Download PUGXI18nBundle
2. Enable the Bundle
3. Entities
4. Repository
5. Form
6. Customize the behaviour for default translation and translation not found

### 1. Download PUGXI18nBundle

**Using composer**

Add the following lines in your composer.json:

```
{
    "require": {
        "pugx/i18n-bundle": "dev-master"
    }
}

```

Now, run the composer to download the bundle:

``` bash
$ php composer.phar update pugx/i18n-bundle
```

### 2. Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new PUGX\I18nBundle\PUGXI18nBundle(),
    );
}
```

### 3. Entities

``` php

<?php

namespace Acme\MyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Article
{    
    /**
     * @ORM\OneToMany(targetEntity="ArticleI18n", mappedBy="translatable", cascade={"persist"})
     */
    protected $translations;

    public function __construct()
    {
        $this->translations = new ArrayCollection();
    }
}

```

``` php

<?php

namespace Acme\MyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ArticleI18n
{    
    /**
     * 
     * @ORM\Column(name="locale", type="string", length=128)
     */
    private $locale;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="translations")
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $translatable;

    /**
     *
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;
}

```
Then run doctrine:generate:entities and *remove the generated method addTranslation* (for Article in this example).
Now you can implements the correct interfaces.

``` php

<?php

use PUGX\I18nBundle\Model\TranslatableWrapper;

class Article extends TranslatableWrapper
{    
    
}

```

TranslatableWrapper extends Translatable (that implements some methods of TranslatableInterface) and adds a magic method to wrap the methods of TranslatingInterface entity.

``` php

<?php

use PUGX\I18nBundle\Model\TranslatingInterface;
use PUGX\I18nBundle\Model\TranslatableInterface;

class ArtcileI18n implements TranslatingInterface
{    
    
}

```

*Remember to modify the signature for ArticleI18n::setTranslatable*

If you want "kill the magic", you can extend directly PUGX\I18nBundle\Model\Translatable and create the needed wrapper methods by yourself.

### 4. Repository

``` php

<?php

namespace Acme\MyBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function getArticleTranslatedQuery()
    {
        $q = $this->createQueryBuilder('a')
            ->select(array('a', 'at'))
            ->leftJoin('a.translations', 'at');

        return $q;
    }
}

```

### 5. Form

A possible form implementation

``` php

<?php

namespace Acme\MyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArtcileI18nFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('locale', 'hidden');
        $builder->add('name');
    }

    public function setDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Acme\MyBundle\Entity\ArtcileI18n',
        );
    }

    public function getName()
    {
        return 'translation';
    }
}

```

``` php

namespace Acme\MyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('translations', 'collection', array(
            'type' => new ArtcileI18nFormType(),
            'allow_add' => true,
            'by_reference' => false,
        ));
    }
}

```
[Allowing "new" tags with the "prototype"] (http://symfony.com/doc/current/cookbook/form/form_collections.html#allowing-new-tags-with-the-prototype)


### 6. Customize the behaviour for default translation and translation not found

If you want use as default translation, the first found translation even if is not a translation for current locale neither for default locale


 ``` php
 protected function acceptFirstTransaltionAsDefault()
 {
     return true;
 }
 ```

 If you want a translation, only if was found one for the current locale


 ``` php
 protected function acceptDefaultLocaleTransaltionAsDefault()
 {
     return false;
 }
 ```

If you want manage by yourself the behaviour in case of translation not found

 ``` php
 protected function handleTranslationNotFound()
 {
     //your logic
 }
 ```

 for example

  ``` php
 protected function handleTranslationNotFound()
 {
     $class = get_class($this) . 'Translation';
     if (class_exists($class)) {
         $this->translation = new $class;
     } else {
         $this->translation = null;
     }
 }
 ```


