<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\AsynchronousOperationsRedis\EntityManager\Operation;

use Magento\AsynchronousOperationsRedis\Model\Connection;
use Magento\Framework\EntityManager\EventManager;
use Magento\Framework\EntityManager\Operation\DeleteInterface;
use Magento\AsynchronousOperationsRedis\EntityManager\Hydrator;
use Magento\AsynchronousOperationsRedis\KeyManager\KeyPool;
use Magento\AsynchronousOperationsRedis\Model\EntitiesPool;

class Delete implements DeleteInterface
{
    /** @var \Magento\Framework\EntityManager\EventManager */
    private $eventManager;

    /** @var Magento\AsynchronousOperationsRedis\Model\Connection */
    private $connection;

    /** @var \Magento\AsynchronousOperationsRedis\EntityManager\Hydrator */
    private $hydrator;

    /** @var \Magento\AsynchronousOperationsRedis\KeyManager\KeyPool */
    private $keyPool;

    /** @var \Magento\AsynchronousOperationsRedis\Model\EntitiesPool  */
    private $entitiesPool;

    /**
     * Delete constructor.
     * @param EventManager $eventManager
     * @param Connection $connection
     * @param Hydrator $hydrator
     * @param KeyPool $keyPool
     * @param EntitiesPool $entitiesPool
     */
    public function __construct(
        EventManager $eventManager,
        Connection $connection,
        Hydrator $hydrator,
        KeyPool $keyPool,
        EntitiesPool $entitiesPool
    ) {
        $this->eventManager = $eventManager;
        $this->connection = $connection;
        $this->hydrator = $hydrator;
        $this->keyPool = $keyPool;
        $this->entitiesPool = $entitiesPool;
    }

    /**
     * Check if redis key exists
     *
     * @param object $entity
     * @param string $identifier
     * @param array $arguments
     * @return object
     * @throws \Exception
     */
    public function execute($entity, $arguments = [])
    {
        /** @var array $entityConfig */
        $entityConfig = $this->entitiesPool->getEntityConfig($entity);
        /** @var \Magento\AsynchronousOperationsRedis\Api\RedisKeyInterface $keyManager */
        $keyManager = $this->keyPool->getKeyManager($entityConfig['type']);

        return $keyManager->drop($keyManager->getId($entity, $entityConfig));
    }
}
