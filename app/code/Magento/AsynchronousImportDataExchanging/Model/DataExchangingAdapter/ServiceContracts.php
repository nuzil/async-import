<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\AsynchronousImportDataExchanging\Model\DataExchangingAdapter;

use Magento\AsynchronousImportDataExchangingApi\Api\Data\ImportInterface;
use Magento\AsynchronousImportDataExchangingApi\Api\ExchangeAdapterInterface;

/**
 * Data exchange adapter for processing requests based on Service contracts.
 *
 * Module is installed as part of Magento monolith
 *
 * @api
 */
class ServiceContracts implements ExchangeAdapterInterface
{

    /**
     * @var array Exchanging properties
     */
    private $exchangingProperties;

    /**
     * ServiceContracts constructor.
     * @param array $exchangingProperties
     */
    public function __construct(
        array $exchangingProperties
    ) {
        $this->exchangingProperties = $exchangingProperties;
    }

    /**
     * Execute
     *
     * @param ImportInterface $import
     * @param array $importData
     *
     * @return void
     */
    public function execute(ImportInterface $import, array $importData): void
    {

    }

}