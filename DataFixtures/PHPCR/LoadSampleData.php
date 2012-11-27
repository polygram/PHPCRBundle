<?php

namespace polygram\PHPCRBundle\DataFixtures\PHPCR;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use PHPCR\Util\NodeHelper;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

use polygram\PHPCRBundle\Document\User;

class LoadSimpleCmsData extends ContainerAware implements FixtureInterface
{
    public function load(ObjectManager $dm)
    {
        $session = $dm->getPhpcrSession();

        $basepath = "/users";

        if ($session->nodeExists($basepath)) {
            $session->removeItem($basepath);
        }

        NodeHelper::createPath($session, $basepath);
        $base = $dm->find(null, $basepath);

        $user = new User;
		$user->username = 'ichoman';
		$user->password = 'password';
		$dm->persist($user);
		
		$dm->flush();
    }


}