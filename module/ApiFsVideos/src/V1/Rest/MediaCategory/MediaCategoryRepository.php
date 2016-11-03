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
        return $this->tableGateway->select(['id' => $id])->current();
    }

    public function findAll()
    {
        $mediaCategory = $this->tableGateway->select();
        return $mediaCategory;

        //return new MediaCategoryCollection(new ArrayAdapter($repository->toArray()));
    }

    public function delete($id)
    {
        return $this->tableGateway->delete(['id' => $id]);
    }

    public function update($id, $data)
    {
        return $this->tableGateway->update((new ObjectProperty($data))->extract($data), ['id' => $id]);
    }

    public function insert($data)
    {
        return $this->tableGateway->insert((new ObjectProperty($data))->extract($data));
    }
}