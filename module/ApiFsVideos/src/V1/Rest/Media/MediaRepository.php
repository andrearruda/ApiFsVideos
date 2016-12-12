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

    public function findAll($params = [])
    {
        $rows = $this->mediaTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($params){

            $columns = array(
                'id', 'media_category_id', 'name', 'description', 'created_at', 'updated_at', 'active'
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

            $sort_by = 'id';
            $sort_order = 'DESC';

            if(!is_null($params->get('sort_by')))
            {
                $field = strtolower($params->get('sort_by'));
                $fields = array('id', 'name');
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

        return new MediaCollection(new ArrayAdapter($rows->toArray()));
    }
}