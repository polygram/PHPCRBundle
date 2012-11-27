##This bundle is a test project for PHPCR

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
        "doctrine/phpcr-odm": "1.0.*",
        "doctrine/doctrine-fixtures-bundle": "dev-master"        
    }
    ```

3. Add the following line, immediately after the last AnnotationRegistry::registerFile line:
```php
AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/phpcr-odm/lib/Doctrine/ODM/PHPCR/Mapping/Annotations/DoctrineAnnotations.php');
```

4. Initialize the bundles in AppKernel.php
```php
new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
new polygram\PHPCRBundle\polygramPHPCRBundle(),
```

5. Add the following to your config.yml
```yaml
doctrine_phpcr:
    session:
        backend:
            type: jackrabbit
            url: http://127.0.0.1:8080/server/
        workspace: default
        username: admin
        password: admin
    odm:
        auto_mapping: true
        auto_generate_proxy_classes: %kernel.debug%
```

6. Download and Run Jackrabbit
```
    wget http://apache.online.bg/jackrabbit/2.4.3/jackrabbit-standalone-2.4.3.jar
    java -jar jackrabbit-standalone-*.jar
```

7. Register node types
```
    app/console doctrine:phpcr:register-system-node-types
```

8. 