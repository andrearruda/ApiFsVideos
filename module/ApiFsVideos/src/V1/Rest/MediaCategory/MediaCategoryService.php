<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class MediaCategoryService
{
    private $mediaCategoryRepository;
    private $mediaCategoryTableGateway;

    public function __construct(MediaCategoryRepository $mediaCategoryRepository, TableGatewayInterface $mediaCategoryTableGateway)
    {
        $this->mediaCategoryRepository = $mediaCategoryRepository;
        $this->mediaCategoryTableGateway = $mediaCategoryTableGateway;
    }

    public function create($data)
    {
        $connection = null;
        try{
            $connection = $this->mediaCategoryTableGateway->getAdapter()->getDriver()->getConnection();
            $connection->beginTransaction();

            $set = (new ObjectProperty())->extract($data);
            $set['id'] = Uuid::uuid4()->toString();
            $set['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
            $set['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');

            $result = $this->mediaCategoryRepository->insert($set);

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
            $row = $this->mediaCategoryRepository->find($id);

            if($row instanceof \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity)
            {
                $connection = $this->mediaCategoryTableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();

                $set = (new ObjectProperty())->extract($data);
                $set['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
                $this->mediaCategoryRepository->update($id, $set);

                $connection->commit();

                return array('id' => $id);
            }
            else
            {
                throw new \Exception('Entity not found.', 404);
            }
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }

            return $e;
        }
    }

    public function delete($id)
    {
        $connection = null;
        try{
            $row = $this->mediaCategoryRepository->find($id);

            if($row instanceof \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity)
            {
                $set = array(
                    'deleted_at' => (new \DateTime())->format('Y-m-d H:i:s')
                );

                $connection = $this->mediaCategoryTableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();

                $this->mediaCategoryRepository->update($id, $set);

                $connection->commit();

                return true;
            }
            else
            {
                throw new \Exception('Entity not found.', 404);
            }
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }

            return $e;
        }
    }
}