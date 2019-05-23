<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\BulkPerformance\Model;

use Magento\BulkPerformance\Api\Data\OperationInterface;
use Magento\Framework\DataObject;

/**
 * Class Operation
 */
class Operation extends DataObject implements OperationInterface
{
    /**
     * @inheritDoc
     */
    public function getId(): ?int
    {
        return $this->getData(self::ID);
    }

    /**
     * @inheritDoc
     */
    public function setId(int $id): OperationInterface
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * @inheritDoc
     */
    public function getBulkUuid(): ?string
    {
        return $this->getData(self::BULK_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBulkUuid(string $bulkId): OperationInterface
    {
        return $this->setData(self::BULK_ID, $bulkId);
    }

    /**
     * @inheritDoc
     */
    public function getTopicName(): ?string
    {
        return $this->getData(self::TOPIC_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setTopicName(string $topic): OperationInterface
    {
        return $this->setData(self::TOPIC_NAME, $topic);
    }

    /**
     * @inheritDoc
     */
    public function getSerializedData(): ?string
    {
        return $this->getData(self::SERIALIZED_DATA);
    }

    /**
     * @inheritDoc
     */
    public function setSerializedData(?string $serializedData): OperationInterface
    {
        return $this->setData(self::SERIALIZED_DATA, $serializedData);
    }

    /**
     * @inheritDoc
     */
    public function getResultSerializedData(): ?string
    {
        return $this->getData(self::RESULT_SERIALIZED_DATA);
    }

    /**
     * @inheritDoc
     */
    public function setResultSerializedData(?string $resultSerializedData): OperationInterface
    {
        return $this->setData(self::RESULT_SERIALIZED_DATA, $resultSerializedData);
    }

    /**
     * @inheritDoc
     */
    public function getStatus(): ?int
    {
        return $this->getData(self::STATUS);
    }

    /**
     * @inheritDoc
     */
    public function setStatus(int $status): OperationInterface
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * @inheritDoc
     */
    public function getResultMessage(): ?string
    {
        return $this->getData(self::RESULT_MESSAGE);
    }

    /**
     * @inheritDoc
     */
    public function setResultMessage(?string $resultMessage): OperationInterface
    {
        return $this->setData(self::RESULT_MESSAGE, $resultMessage);
    }

    /**
     * @inheritDoc
     */
    public function getErrorCode(): ?string
    {
        return $this->getData(self::ERROR_CODE);
    }

    /**
     * @inheritDoc
     */
    public function setErrorCode(?string $errorCode): OperationInterface
    {
        return $this->setData(self::ERROR_CODE, $errorCode);
    }

    /**
     * @inheritDoc
     */
    public function getCreatedAt(): ?string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @inheritDoc
     */
    public function getFinishedAt(): ?string
    {
        return $this->getData(self::FINISHED_AT);
    }

    /**
     * @inheritDoc
     */
    public function setFinishedAt(?string $date): OperationInterface
    {
        return $this->setData(self::FINISHED_AT, $date);
    }

    /**
     * Retrieve existing extension attributes object.
     *
     * @return \Magento\AsynchronousOperations\Api\Data\OperationExtensionInterface|null
     */
    public function getExtensionAttributes(): \Magento\AsynchronousOperations\Api\Data\OperationExtensionInterface
    {
        return $this->getData(self::EXTENSION_ATTRIBUTES_KEY);
    }

    /**
     * Set an extension attributes object.
     *
     * @param \Magento\AsynchronousOperations\Api\Data\OperationExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Magento\AsynchronousOperations\Api\Data\OperationExtensionInterface $extensionAttributes
    ): OperationInterface {
        return $this->setData(self::EXTENSION_ATTRIBUTES_KEY, $extensionAttributes);
    }
}
