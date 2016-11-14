<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Interop\Container\ContainerInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Hydrator\ArraySerializable;

class MediaCategoryTableGatewayFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $hydratingResultSet = new HydratingResultSet(new ArraySerializable(), new MediaCategoryEntity());
        $dbAdapter = $container->get('DbAdapter');

        return new TableGateway('media_category', $dbAdapter, null, $hydratingResultSet);
    }
}