<?php

namespace OSG\ArduinosBundle\Block;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormFactoryInterface;

use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\BaseBlockService;

use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Forms;

use Sonata\AdminBundle\Validator\ErrorElement;

use OSG\ArduinosBundle\Entity\Arduino;
use OSG\ArduinosBundle\Form\ArduinoType;
use OSG\DevicesBundle\Form\DeviceType;
use Symfony\Component\Form\PreloadedExtension;


use Saxulum\DoctrineOrmManagerRegistry\Provider\DoctrineOrmManagerRegistryProvider;
use Silex\Provider\FormServiceProvider;
// use Symfony\Component\Form\FormFactoryInterface;

class ArduinosShowBlockService extends BaseBlockService {
	
	private $manager;
	private $id;
    private $formFactory;

    public function __construct($name, $templating_service, EntityManager $manager) {
        parent::__construct($name, $templating_service);
        // $this->formFactory = $formFactory;
        $this->manager = $manager;
        // $this->id = $id;
    }


	public function setDefaultSettings(OptionsResolverInterface $resolver)
	{
	    $resolver->setDefaults(array(
	        'template' => 'OSGArduinosBundle:Block:arduino_show.html.twig',
            'arduino_id' => '0' 
	    ));
	}

	public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
	{
  
	}



	/**
     * {@inheritdoc}
     */
    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        
        $block = $blockContext->getBlock();
        
        $settings = $block->getSettings();

        $resolver = new OptionsResolver();
        $entity = $this->manager->getRepository('OSGArduinosBundle:Arduino')->find($settings['arduino_id']);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Arduino entity.');
        }
        
        $devices = $this->manager->getRepository('OSGDevicesBundle:Device')
            ->findAllByArduinoId($settings['arduino_id']);

        $arduinoType = new ArduinoType();
        $deviceType = new DeviceType();

        $formFactory = Forms::createFormFactoryBuilder()
            ->addExtensions(array(
                new PreloadedExtension(
                    array(
                        $arduinoType->getName() => $arduinoType,
                        
                    ),
                    array()),
                new PreloadedExtension(
                    array(
                        $deviceType->getName() => $deviceType
                    ),
                    array())
                ))
                ->getFormFactory();

                // var_dump($devices);
        
        $editForm = $formFactory->create();
        $editForm->add('name');
        $editForm->add('arduino', 'osg_arduinosbundle_arduino');
        $editForm->add('devices', 'osg_devicesbundle_device');
        $editForm->add('submit', 'submit');
        $editForm->add('delete', 'submit');
        return $this->renderResponse($blockContext->getTemplate(), 
            array(
            'entity'      => $entity,
            '$devices'    => $devices,
            'edit_form'   => $editForm->createView(),
            // 'delete_form' => $deleteForm->createView(),
        ));
        
        return $response;
    }

}
