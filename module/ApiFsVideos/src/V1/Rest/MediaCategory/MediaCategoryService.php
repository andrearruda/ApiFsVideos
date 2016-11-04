<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Db\TableGateway\TableGatewayInterface;

class MediaCategoryService
{
    private $mediaCategoryRepository;
    private $tableGateway;

    public function __construct(MediaCategoryRepository $mediaCategoryRepository, TableGatewayInterface $tableGateway)
    {
        $this->mediaCategoryRepository = $mediaCategoryRepository;
        $this->tableGateway = $tableGateway;
    }

    public function created($data)
    {
        $connection = null;
        try{
            $connection = $this->tableGateway->getAdapter()->getDriver()->getConnection();
            $connection->beginTransaction();
            $result = $this->mediaCategoryRepository->insert($data);
            $connection->commit();

            return array('id' => $result);
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }
            return $e;
        }
    }

    public function update($id, $data)
    {
        $connection = null;
        try{
            $connection = $this->tableGateway->getAdapter()->getDriver()->getConnection();
            $connection->beginTransaction();
            $result = $this->mediaCategoryRepository->update($data, $id);
            $connection->commit();

            return array('id' => $result);
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }
            return $e;
        }
    }

    public function delete($id)
    {
        $mediaCategoryEntity = $this->mediaCategoryRepository->find($id);
        $connection = null;
        try{
            if(!$mediaCategoryEntity instanceof \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity)
            {
                throw new \Exception('It was not possible to find the entity');
            }
            else
            {
                $connection = $this->tableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();
                $this->mediaCategoryRepository->delete($id);
                $connection->commit();
            }

            return true;
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }
            return $e;
        }
    }
}