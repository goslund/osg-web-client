<?php

namespace OSG\HomePageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ControlPanelController extends Controller
{
    /**
     * @Route("/control-panel")
     * @Template()
     */
    public function indexAction()
    {

    	$fp = fsockopen("localhost", 8103, $errno, $errstr, 30);
    	$ret = "";

    	if (!$fp) {
		    $ret = "$errstr ($errno)<br />\n";
		} else { 		
		    while (!feof($fp)) {
		        $ret = fgets($fp, 128);
    		}
    		fclose($fp);	
		}
        return array('name' => $ret);
    }
}
