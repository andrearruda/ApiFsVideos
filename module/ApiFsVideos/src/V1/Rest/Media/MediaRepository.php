<?php

namespace ApiFsVideos\V1\Rest\Media;

use Zend\Db\TableGateway\TableGatewayInterface;
use Zend\Paginator\Adapter\ArrayAdapter;

class MediaRepository
{
    private $mediaTableGateway, $mediaCategoryTableGateway;
    private $mediaHydrator, $mediaCategoryHydrator;

    public function __construct(
        TableGatewayInterface $mediaTableGateway,
        TableGatewayInterface $mediaCategoryTableGateway,
        MediaHydrator $mediaHydrator,
        MediaCategoryHydrator $mediaCategoryHydrator
    )
    {
        $this->mediaTableGateway = $mediaTableGateway;
        $this->mediaCategoryTableGateway = $mediaCategoryTableGateway;

        $this->mediaHydrator = $mediaHydrator;
        $this->mediaCategoryHydrator = $mediaCategoryHydrator;
    }

    public function find($id)
    {
        $media = $this->mediaTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($id){
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
        })->current();

        $mediaCategory = $this->mediaCategoryTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($media){
            $select->where(array('deleted_at' => null));
            $select->where(array('id' => $media->getMediaCategoryId()));
            $select->order('id DESC');
        })->current();

        $media->setMediaCategory($this->mediaCategoryHydrator->extract($mediaCategory));

        return $media;
    }

    public function findAll()
    {
        $result = [];

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

        foreach ($rows as $key => $media)
        {
            $mediaCategory = $this->mediaCategoryTableGateway->select(function(\Zend\Db\Sql\Select $select) use ($media){
                $select->where(array('deleted_at' => null));
                $select->where(array('id' => $media->getMediaCategoryId()));
                $select->order('id DESC');
            })->current();


            $media->setMediaCategory($this->mediaCategoryHydrator->extract($mediaCategory));

            $result[$key] = $this->mediaHydrator->extract($media);
        }

        return new MediaCollection(new ArrayAdapter($result));
    }
}