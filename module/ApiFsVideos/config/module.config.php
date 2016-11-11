<?php
return [
    'router' => [
        'routes' => [
            'api-fs-videos.rest.media' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/v1/media[/:media_id]',
                    'defaults' => [
                        'controller' => 'ApiFsVideos\\V1\\Rest\\Media\\Controller',
                    ],
                ],
            ],
            'api-fs-videos.rest.media-category' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/v1/media_category[/:media_category_id]',
                    'defaults' => [
                        'controller' => 'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller',
                    ],
                ],
            ],
            'api-fs-videos.rest.media-image' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/media_image[/:media_image_id]',
                    'defaults' => [
                        'controller' => 'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller',
                    ],
                ],
            ],
            'api-fs-videos.rest.media-video' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/media_video[/:media_video_id]',
                    'defaults' => [
                        'controller' => 'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'api-fs-videos.rest.media',
            3 => 'api-fs-videos.rest.media-category',
            4 => 'api-fs-videos.rest.media-image',
            5 => 'api-fs-videos.rest.media-video',
        ],
    ],
    'zf-rest' => [
        'ApiFsVideos\\V1\\Rest\\Media\\Controller' => [
            'listener' => \ApiFsVideos\V1\Rest\Media\MediaResource::class,
            'route_name' => 'api-fs-videos.rest.media',
            'route_identifier_name' => 'media_id',
            'collection_name' => 'media',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApiFsVideos\V1\Rest\Media\MediaEntity::class,
            'collection_class' => \ApiFsVideos\V1\Rest\Media\MediaCollection::class,
            'service_name' => 'media',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller' => [
            'listener' => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryResource::class,
            'route_name' => 'api-fs-videos.rest.media-category',
            'route_identifier_name' => 'media_category_id',
            'collection_name' => 'media_category',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity::class,
            'collection_class' => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryCollection::class,
            'service_name' => 'media_category',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller' => [
            'listener' => 'ApiFsVideos\\V1\\Rest\\MediaImage\\MediaImageResource',
            'route_name' => 'api-fs-videos.rest.media-image',
            'route_identifier_name' => 'media_image_id',
            'collection_name' => 'media_image',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApiFsVideos\V1\Rest\MediaImage\MediaImageEntity::class,
            'collection_class' => \ApiFsVideos\V1\Rest\MediaImage\MediaImageCollection::class,
            'service_name' => 'media_image',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller' => [
            'listener' => 'ApiFsVideos\\V1\\Rest\\MediaVideo\\MediaVideoResource',
            'route_name' => 'api-fs-videos.rest.media-video',
            'route_identifier_name' => 'media_video_id',
            'collection_name' => 'media_video',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \ApiFsVideos\V1\Rest\MediaVideo\MediaVideoEntity::class,
            'collection_class' => \ApiFsVideos\V1\Rest\MediaVideo\MediaVideoCollection::class,
            'service_name' => 'media_video',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'ApiFsVideos\\V1\\Rest\\Media\\Controller' => 'HalJson',
            'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller' => 'HalJson',
            'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller' => 'HalJson',
            'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'ApiFsVideos\\V1\\Rest\\Media\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'ApiFsVideos\\V1\\Rest\\Media\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/json',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller' => [
                0 => 'application/vnd.api-fs-videos.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \ApiFsVideos\V1\Rest\Media\MediaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-fs-videos.rest.media',
                'route_identifier_name' => 'media_id',
                'hydrator' => \ApiFsVideos\V1\Rest\Media\MediaHydrator::class,
            ],
            \ApiFsVideos\V1\Rest\Media\MediaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-fs-videos.rest.media',
                'route_identifier_name' => 'media_id',
                'is_collection' => true,
            ],
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-fs-videos.rest.media-category',
                'route_identifier_name' => 'media_category_id',
                'hydrator' => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryHydrator::class,
            ],
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api-fs-videos.rest.media-category',
                'route_identifier_name' => 'media_category_id',
                'is_collection' => true,
            ],
            \ApiFsVideos\V1\Rest\MediaImage\MediaImageEntity::class => [
                'entity_identifier_name' => 'media_id',
                'route_name' => 'api-fs-videos.rest.media-image',
                'route_identifier_name' => 'media_image_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \ApiFsVideos\V1\Rest\MediaImage\MediaImageCollection::class => [
                'entity_identifier_name' => 'media_id',
                'route_name' => 'api-fs-videos.rest.media-image',
                'route_identifier_name' => 'media_image_id',
                'is_collection' => true,
            ],
            \ApiFsVideos\V1\Rest\MediaVideo\MediaVideoEntity::class => [
                'entity_identifier_name' => 'media_id',
                'route_name' => 'api-fs-videos.rest.media-video',
                'route_identifier_name' => 'media_video_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \ApiFsVideos\V1\Rest\MediaVideo\MediaVideoCollection::class => [
                'entity_identifier_name' => 'media_id',
                'route_name' => 'api-fs-videos.rest.media-video',
                'route_identifier_name' => 'media_video_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            \ApiFsVideos\V1\Rest\Media\MediaResource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'media',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'ApiFsVideos\\V1\\Rest\\Media\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'ApiFsVideos\\V1\\Rest\\Media\\MediaResource\\Table',
            ],
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryResource::class => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'media_category',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'ApiFsVideos\\V1\\Rest\\MediaCategory\\MediaCategoryResource\\Table',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaImage\\MediaImageResource' => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'media_image',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller',
                'entity_identifier_name' => 'media_id',
                'table_service' => 'ApiFsVideos\\V1\\Rest\\MediaImage\\MediaImageResource\\Table',
            ],
            'ApiFsVideos\\V1\\Rest\\MediaVideo\\MediaVideoResource' => [
                'adapter_name' => 'DbAdapter',
                'table_name' => 'media_video',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller',
                'entity_identifier_name' => 'media_id',
            ],
        ],
    ],
    'zf-content-validation' => [
        'ApiFsVideos\\V1\\Rest\\Media\\Controller' => [
            'input_filter' => 'ApiFsVideos\\V1\\Rest\\Media\\Validator',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaCategory\\Controller' => [
            'input_filter' => 'ApiFsVideos\\V1\\Rest\\MediaCategory\\Validator',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaImage\\Controller' => [
            'input_filter' => 'ApiFsVideos\\V1\\Rest\\MediaImage\\Validator',
        ],
        'ApiFsVideos\\V1\\Rest\\MediaVideo\\Controller' => [
            'input_filter' => 'ApiFsVideos\\V1\\Rest\\MediaVideo\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'ApiFsVideos\\V1\\Rest\\Media\\Validator' => [
            0 => [
                'name' => 'media_category_id',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => 'ZF\\ContentValidation\\Validator\\DbRecordExists',
                        'options' => [
                            'adapter' => 'DbAdapter',
                            'table' => 'media_category',
                            'field' => 'id',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '65535',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'created_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'updated_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'deleted_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            6 => [
                'name' => 'active',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
        ],
        'ApiFsVideos\\V1\\Rest\\MediaImage\\Validator' => [
            0 => [
                'name' => 'type',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '15',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'path',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '65535',
                        ],
                    ],
                ],
            ],
        ],
        'ApiFsVideos\\V1\\Rest\\MediaCategory\\Validator' => [
            0 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'created_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
                'continue_if_empty' => false,
            ],
            2 => [
                'name' => 'updated_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
                'continue_if_empty' => false,
            ],
            3 => [
                'name' => 'deleted_at',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'active',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'continue_if_empty' => false,
            ],
        ],
        'ApiFsVideos\\V1\\Rest\\MediaVideo\\Validator' => [
            0 => [
                'name' => 'type',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '15',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'name',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'path',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '65535',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryResource::class => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryResourceFactory::class,
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryRepository::class => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryRepositoryFactory::class,
            'ApiFsVideos\\V1\\Rest\\MediaCategory\\TableGateway' => \ApiFsVideos\V1\Rest\MediaCategory\TableGatewayFactory::class,
            \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryService::class => \ApiFsVideos\V1\Rest\MediaCategory\MediaCategoryServiceFactory::class,
            \ApiFsVideos\V1\Rest\Media\MediaResource::class => \ApiFsVideos\V1\Rest\Media\MediaResourceFactory::class,
            \ApiFsVideos\V1\Rest\Media\MediaRepository::class => \ApiFsVideos\V1\Rest\Media\MediaRepositoryFactory::class,
            'ApiFsVideos\\V1\\Rest\\Media\\TableGateway' => \ApiFsVideos\V1\Rest\Media\TableGatewayFactory::class,
            'ApiFsVideos\\V1\\Rest\\Media\\MediaService' => 'ApiFsVideos\\V1\\Rest\\Media\\MediaServiceFactory',
        ],
    ],
];
