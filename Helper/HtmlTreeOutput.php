<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace polygram\PHPCRBundle\Helper;

use Symfony\Component\Console\Output\Output;


class HtmlTreeOutput extends Output
{
    public $output = '';
    public $offset = 0;
    
    public function clear()
    {
        $this->output = '';
    }

    protected function doWrite($message, $newline)
    {
        $this->output .= $this->openBranch();
        $this->output .= $message . ($newline ? "<br />" : '');
        $this->output .= $this->closeBranch();
    }
    
    public function dump()
    {
       echo $this->wrapper($this->output); 
    }
      
    private function openBranch()
    {
       $this->offset++;
       return sprintf('<div style="margin-left:%s0px;">', $this->offset);  
    }
    
    private function closeBranch()
    {
        return '</div>';
    }
    
    private function wrapper($output)
    {
        return sprintf(<<<EOF
        <style type="text/css">
        .html_tree_bgr {
            background-color:#000000;
            color:#f1f112;
        }
        </style>   
        <div class="html_tree_bgr" >
           %s
        </div>  
EOF
, $output); 
    }
}

