<?php

namespace polygram\PHPCRBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use PHPCR\Util\TreeWalker;
use PHPCR\Util\Console\Helper\ConsoleParametersParser;
use PHPCR\Util\Console\Helper\TreeDumper\ConsoleDumperNodeVisitor;
use PHPCR\Util\Console\Helper\TreeDumper\ConsoleDumperPropertyVisitor;
use PHPCR\Util\Console\Helper\TreeDumper\SystemNodeFilter;

use polygram\PHPCRBundle\Helper\HtmlTreeOutput;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction()
    {
        $session     = $this->get('doctrine_phpcr.session');
        $identifier  = "/";
        $output      = new HtmlTreeOutput();
        $nodeVisitor = new ConsoleDumperNodeVisitor($output);
        $propVisitor = null;
        $walker      = new TreeWalker($nodeVisitor, $propVisitor);

        $filter = new SystemNodeFilter();
        $walker->addNodeFilter($filter);
        $walker->addPropertyFilter($filter);

        try {
            $node = $session->getNodeByIdentifier($identifier);
            $walker->traverse($node, -1);
        } catch (RepositoryException $e) {
            if ($e instanceof PathNotFoundException || $e instanceof ItemNotFoundException) {
                $output->writeln("<error>Path '$identifier' does not exist</error>");
                return 1;
            }
        }
        
        return array('output' => $output);
    }
}
