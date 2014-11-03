<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace OSG\HomePageBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class ControlPanelBuilder extends ContainerAware
{
    public function controlPanelMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root', array('childrenAttributes' => array('class' => 'nav nav-tabs', 'role'=>'tablist')));
        

        $menu->addChild('dashboard', array(
            'attributes'=>array(
                'role' => "presentation",
                ),
            'route' => 'osg_homepage_controlpanel_index')
        );

        $menu->addChild('arduinos', array(
            'attributes'=>array(
                'role' => "presentation" 
                ),
            'route' => 'osg_arduinos_default_index'
            )
        );

        $menu->addChild('devices', array(
            'attributes' => array(
                'role' => "presentation"
            ),
            'route' => 'osg_devices_default_index'
        ));

        return $menu;
    }
}
