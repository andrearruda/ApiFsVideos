<?php

namespace ApiFsVideos\V1\Rest\Media;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaRepository
{
    private $mediaTableGateway;

    public function __construct(TableGatewayInterface $mediaTableGateway)
    {
        $this->mediaTableGateway = $mediaTableGateway;
    }

    public function insert($data)
    {
        $this->mediaTableGateway->insert($data);
        return $this->mediaTableGateway->getLastInsertValue();
    }

    public function update($id, $data)
    {
        return $this->mediaTableGateway->update($data, array('id' => $id));
    }

    public function find($id)
    {
        $row = $this->mediaTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
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

        return $row->current();
    }

    public function findAll()
    {
        $rows = $this->mediaTableGateway->select(function(\Zend\Db\Sql\Select $select){
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

        return new MediaCollection(new ArrayAdapter($rows->toArray()));
    }
}