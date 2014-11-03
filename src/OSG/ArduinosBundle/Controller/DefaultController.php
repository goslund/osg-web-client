<?php

namespace OSG\ArduinosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use OSG\ArduinosBundle\Block\ArduinosEditBlockService;
use OSG\ArduinosBundle\Block\ArduinosShowBlockService;

class DefaultController extends Controller
{
    /**
     * @Route("/control-panel/arduinos", name="osg_arduinos_default_index")
     * @Template()
     */
    public function indexAction()
    {   	
        return array();
    }


    /**
     * @Route("/control-panel/arduino/{id}/edit", name="control-panel_arduino_edit")
     * @Template("OSGArduinosBundle:Default:arduinos_edit.html.twig")
     */
    public function editAction($id)
    {	
    	$em = $this->getDoctrine()->getManager();
    	$template = $this->get('templating');
        $request = $this->getRequest();
    	$block = new ArduinosEditBlockService('osg.arduinos.edit', $template, $em, $request);
        return array(
        	'my_block' => $block,
            'id' => $id
            );

    }

    /**
     * @Route("/control-panel/arduino/{id}", name="control-panel_arduino_show")
     * @Template("OSGArduinosBundle:Default:arduinos_show.html.twig")
     */
    public function showAction($id)
    {   
        $em = $this->getDoctrine()->getManager();
        $template = $this->get('templating');
        $request = $this->getRequest();
        $block = new ArduinosShowBlockService('osg.arduinos.show', $template, $em, $request);
        return array(
            'my_block' => $block,
            'id' => $id
            );

    }


}
