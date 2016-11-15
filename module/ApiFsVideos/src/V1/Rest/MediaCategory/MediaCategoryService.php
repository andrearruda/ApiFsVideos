<?php

namespace ApiFsVideos\V1\Rest\MediaCategory;

use Zend\Db\TableGateway\TableGatewayInterface;

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
        $set = array(
            'name' => $data->name,
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
            'active' => false
        );

        $connection = null;
        try{
            $connection = $this->mediaCategoryTableGateway->getAdapter()->getDriver()->getConnection();
            $connection->beginTransaction();

            $result = $this->mediaCategoryRepository->insert($set);

            $connection->commit();

            return array('id' => $result);
        }catch (\Exception $e) {
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
                $data = array(
                    'deleted_at' => (new \DateTime())->format('Y-m-d H:i:s')
                );

                $connection = $this->mediaCategoryTableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();

                $this->mediaCategoryRepository->update($id, $data);

                $connection->commit();

                return true;
            }
            else
            {
                return false;
            }
        }catch (\Exception $e){
            if ($connection instanceof \Zend\Db\Adapter\Driver\ConnectionInterface) {
                $connection->rollback();
            }

            return $e;
        }
    }
}