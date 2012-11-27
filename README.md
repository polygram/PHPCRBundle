This bundle is a test project for PHPCR

1. To install first add the following to composer.json

"polygram/phpcr-bundle": "dev-master"

2. Run "composer update"

It should also install the bundle dependencies

"require": {
    ...
    "jackalope/jackalope-jackrabbit": "1.0.*",
    "doctrine/phpcr-bundle": "1.0.*",
    "doctrine/phpcr-odm": "1.0.*"
}

3. Add the following line, immediately after the last AnnotationRegistry::registerFile line:

AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/phpcr-odm/lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php');