<?php

namespace ApiFsVideos\V1\Rest\Media;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function find($id)
    {
        $media = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
            $select->columns(array(
                'id',
                'media_category_id',
                'name',
                'description',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('id' => $id));
            $select->where(array('deleted_at' => null), \Zend\Db\Sql\Where::OP_AND);
        });
        return $media->current();
    }

    public function findAll()
    {
        $media = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select){
            $select->columns(array(
                'id',
                'media_category_id',
                'name',
                'description',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('deleted_at' => null));
            $select->order('id DESC');
        });

        return new MediaCollection(new ArrayAdapter($media->toArray()));
    }
}