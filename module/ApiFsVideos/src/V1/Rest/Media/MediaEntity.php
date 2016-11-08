<?php
namespace ApiFsVideos\V1\Rest\Media;

use ArrayObject;

class MediaEntity extends ArrayObject
{
    private $id;
    private $media_category_id;
    private $media_category, $media_image, $media_video;
    private $name;
    private $description;
    private $created_at, $updated_at, $deleted_at;
    private $active;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MediaEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediaCategoryId()
    {
        return $this->media_category_id;
    }

    /**
     * @param mixed $media_category_id
     * @return MediaEntity
     */
    public function setMediaCategoryId($media_category_id)
    {
        $this->media_category_id = $media_category_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return MediaEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return MediaEntity
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     * @return MediaEntity
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     * @return MediaEntity
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $deleted_at
     * @return MediaEntity
     */
    public function setDeletedAt($deleted_at)
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     * @return MediaEntity
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediaCategory()
    {
        return $this->media_category;
    }

    /**
     * @param mixed $media_category
     * @return MediaEntity
     */
    public function setMediaCategory($media_category)
    {
        $this->media_category = $media_category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediaImage()
    {
        return $this->media_image;
    }

    /**
     * @param mixed $media_image
     * @return MediaEntity
     */
    public function setMediaImage($media_image)
    {
        $this->media_image = $media_image;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMediaVideo()
    {
        return $this->media_video;
    }

    /**
     * @param mixed $media_video
     * @return MediaEntity
     */
    public function setMediaVideo($media_video)
    {
        $this->media_video = $media_video;
        return $this;
    }
}