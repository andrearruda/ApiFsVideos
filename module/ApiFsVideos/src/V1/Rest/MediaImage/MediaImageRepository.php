<?php

namespace ApiFsVideos\V1\Rest\MediaImage;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaImageRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function find($id)
    {
        $mediaImage = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
            $select->columns(array(
                'media_id',
                'type',
                'path'
            ));
            $select->where(array('media_id' => $id));
        });
        return $mediaImage->current();
    }

    public function findAll()
    {
        $mediaImage = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select){
            $select->order('media_id DESC');
        });

        return new MediaImageCollection(new ArrayAdapter($mediaImage->toArray()));
    }

    public function insert($data)
    {
        return false;
    }

    public function update($data, $id)
    {
        return false;
    }

    public function delete($id)
    {
        return false;
    }
}