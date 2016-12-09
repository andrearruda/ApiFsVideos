<?php

namespace ApiFsVideos\V1\Rest\Media;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Hydrator\ObjectProperty;

class MediaService
{
    private $mediaRepository;
    private $mediaTableGateway;

    public function __construct(MediaRepository $mediaRepository, TableGatewayInterface $mediaTableGateway)
    {
        $this->mediaRepository = $mediaRepository;
        $this->mediaTableGateway = $mediaTableGateway;
    }

    public function create($data)
    {
        $connection = null;
        try{
            $connection = $this->mediaTableGateway->getAdapter()->getDriver()->getConnection();
            $connection->beginTransaction();

            $set = (new ObjectProperty())->extract($data);
            $set['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
            $set['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
            $result = $this->mediaRepository->insert($set);

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
            $row = $this->mediaRepository->find($id);

            if($row instanceof \ApiFsVideos\V1\Rest\Media\MediaEntity)
            {
                $connection = $this->mediaTableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();

                $set = (new ObjectProperty())->extract($data);
                $set['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
                $this->mediaRepository->update($id, $set);

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
            $row = $this->mediaRepository->find($id);

            if($row instanceof \ApiFsVideos\V1\Rest\Media\MediaEntity)
            {
                $set = array(
                    'deleted_at' => (new \DateTime())->format('Y-m-d H:i:s')
                );

                $connection = $this->mediaTableGateway->getAdapter()->getDriver()->getConnection();
                $connection->beginTransaction();

                $this->mediaRepository->update($id, $set);

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