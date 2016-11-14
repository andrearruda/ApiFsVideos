<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaCategoryRepository
{
    private $mediaCategoryTableGateway;

    public function __construct(TableGatewayInterface $mediaCategoryTableGateway)
    {
        $this->mediaCategoryTableGateway = $mediaCategoryTableGateway;
    }

    public function find($id)
    {
        $row = $this->mediaCategoryTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
            $select->columns(array(
                'id',
                'name',
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
        $rows = $this->mediaCategoryTableGateway->select(function(\Zend\Db\Sql\Select $select){
            $select->columns(array(
                'id',
                'name',
                'created_at', 'updated_at',
                'active'
            ));
            $select->where(array('deleted_at' => null));
            $select->order('id DESC');
        });

        return new MediaCategoryCollection(new ArrayAdapter($rows->toArray()));
    }


}