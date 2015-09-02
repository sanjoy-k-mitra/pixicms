<?php
namespace Pixi\CoreBundle\Services;
use Pixi\CoreBundle\Events\PixiEvent;
use Pixi\CoreBundle\Events\RouteEntry;
use Pixi\CoreBundle\Events\RouteEvent;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Created by PhpStorm.
 * User: sanjoy
 * Date: 8/28/15
 * Time: 2:37 AM
 */
class BundleService extends ContainerAware
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher){
        $this->dispatcher = $dispatcher;
    }

    public function triggerEvent($eventName, PixiEvent $event = null){
        if(is_null($event)){
            $event = new PixiEvent();
        }
        $this->dispatcher->dispatch($eventName, $event);
        return $event;
    }

    public function superAdminRoutes(RouteEvent $event){
        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN')) {
            $event->addData(new RouteEntry('user', '/user', '/bundles/pixicore/templates/acl/user.html'));
            $event->addData(new RouteEntry('role', '/role', '/bundles/pixicore/templates/acl/role.html'));
            $event->addData(new RouteEntry('permission', '/permission', '/bundles/pixicore/templates/acl/permission.html'));
        }
    }
}