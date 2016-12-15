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

    public function insert($data)
    {
        $this->mediaCategoryTableGateway->insert($data);
        return $data['id'];
    }

    public function update($id, $data)
    {
        return $this->mediaCategoryTableGateway->update($data, array('id' => $id));
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

    public function findAll($params = [])
    {
        $rows = $this->mediaCategoryTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($params){

            $columns = array(
                'id', 'name', 'created_at', 'updated_at', 'active'
            );

            if(!is_null($params->get('fields')))
            {
                $fields = explode(',' ,$params->get('fields'));

                foreach ($fields as $key => $field)
                {
                    if(in_array($field, $columns) === false)
                    {
                        unset($fields[$key]);
                    }
                }

                $columns = $fields;
            }

            $select->columns($columns);
            $select->where(array('deleted_at' => null));

            $sort_by = 'name';
            $sort_order = 'ASC';

            if(!is_null($params->get('sort_by')))
            {
                $field = strtolower($params->get('sort_by'));
                $fields = array('created_at', 'updated_at', 'name');
                $sort_by = in_array($field, $fields) ? $field : 'id';
            }

            if(!is_null($params->get('sort_order')))
            {
                $orderDirection = strtoupper($params->get('sort_order'));
                $sort_order = in_array($orderDirection, array('ASC', 'DESC')) ? $orderDirection : '';
            }

            $select->order(array(
                $sort_by => $sort_order
            ));
        });

        return new MediaCategoryCollection(new ArrayAdapter($rows->toArray()));
    }
}