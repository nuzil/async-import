<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\AsynchronousImportAdvancedPricing\Model\DataExchangingStrategy\AdvancedPricing\Behaviour;

use Magento\AsynchronousImportDataExchangingApi\Api\Data\ImportInterface;
use Magento\AsynchronousImportDataExchangingApi\Model\ExchangeDataBehaviourInterface;
use Magento\AsynchronousImportDataExchanging\Model\ExchangeAdaptersRegistry;
use Magento\AsynchronousImportDataExchangingApi\Api\ExchangeAdapterInterface;

/**
 * @inheritdoc
 */
class Add implements ExchangeDataBehaviourInterface
{

    /**
     * @var ExchangeAdaptersRegistry
     */
    private $exchangeAdaptersRegistry;

    /**
     * @var ExchangeAdapterInterface
     */
    private $exchangeAdapter;

    /**
     * Add constructor.
     *
     * @param ExchangeAdaptersRegistry $exchangeAdaptersRegistry
     */
    public function __construct(
        ExchangeAdaptersRegistry $exchangeAdaptersRegistry
    ) {
        $this->exchangeAdaptersRegistry = $exchangeAdaptersRegistry;
        $this->exchangeAdapter = $exchangeAdaptersRegistry->get();

    }

    /**
     * Execute Add operation for Advanced Pricing
     *
     * @param ImportInterface $import
     * @param array $importData
     *
     * @return void
     */
    public function execute(ImportInterface $import, array $importData): void
    {
        $this->exchangeAdapter->execute($import, $importData);
    }

}