<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaCategoryRepository
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function find($id)
    {
        $mediaCategory = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
            $select->columns(array(
                'id',
                'name',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('id' => $id));
            $select->where(array('deleted_at' => null), \Zend\Db\Sql\Where::OP_AND);
        });
        return $mediaCategory->current();
    }

    public function findAll()
    {
        $mediaCategory = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select){
            $select->columns(array(
                'id',
                'name',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('deleted_at' => null));
            $select->order('id DESC');
        });

        return new MediaCategoryCollection(new ArrayAdapter($mediaCategory->toArray()));
    }

    public function findAllActive()
    {
        $mediaCategory = $this->tableGateway->select(function(\Zend\Db\Sql\Select $select){
            $select->columns(array(
                'id',
                'name',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('deleted_at' => null));
            $select->where(array('active' => '1'), \Zend\Db\Sql\Where::OP_AND);
            $select->order('id DESC');
        });

        return new MediaCategoryCollection(new ArrayAdapter($mediaCategory->toArray()));
    }

    public function insert($data)
    {
        $data = (new ObjectProperty())->extract($data);
        $data = array_merge(
            $data,
            array(
                'created_at' => (new \DateTime())->format ('Y-m-d H:i:s'),
                'updated_at' => (new \DateTime())->format ('Y-m-d H:i:s'),
                'active' => false
            )
        );

        $this->tableGateway->insert($data);
        return $this->tableGateway->getLastInsertValue();
    }

    public function update($data, $id)
    {
        $data = (new ObjectProperty())->extract($data);
        $data = array_merge(
            $data,
            array(
                'updated_at' => (new \DateTime())->format ('Y-m-d H:i:s')
            )
        );

        return $this->tableGateway->update($data, array('id' => $id));
    }

    public function delete($id)
    {
        $data = array(
            'deleted_at' => (new \DateTime())->format ('Y-m-d H:i:s')
        );

        return $this->tableGateway->update($data, ['id' => $id]);
    }
}