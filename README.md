This bundle is a test project for PHPCR

1. To install first add the following to composer.json
```json
    "polygram/phpcr-bundle": "dev-master"
```

2. Run 
    
    "composer update"

It should also install the bundle dependencies
```json
"require": {
    ...
    "jackalope/jackalope-jackrabbit": "1.0.*",
    "doctrine/phpcr-bundle": "1.0.*",
    "doctrine/phpcr-odm": "1.0.*"
}
```

3. Add the following line, immediately after the last AnnotationRegistry::registerFile line:
```php
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/phpcr-odm/lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php');
```

4. Initialize the bundles in AppKernel.php
```php
new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
new polygram\PHPCRBundle\polygramPHPCRBundle(),
```