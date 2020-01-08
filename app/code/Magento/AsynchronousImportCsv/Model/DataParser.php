<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\AsynchronousImportCsv\Model;

use Magento\AsynchronousImportCsvApi\Api\Data\CsvFormatInterface;
use Magento\AsynchronousImportCsvApi\Model\DataParserInterface;

/**
 * @inheritdoc
 */
class DataParser implements DataParserInterface
{
    /**
     * @var string
     */
    private $csvDelimiter;

    /**
     * @var string
     */
    private $csvEnclosure;

    /**
     * @var string
     */
    private $csvEscape;

    /**
     * @inheritdoc
     */
    public function execute(array $data, CsvFormatInterface $csvFormat = null): array
    {
        $this->csvDelimiter = CsvFormatInterface::DEFAULT_DELIMITER;
        $this->csvEnclosure = CsvFormatInterface::DEFAULT_ENCLOSURE;
        $this->csvEscape = CsvFormatInterface::DEFAULT_ESCAPE;

        if ($csvFormat !== null) {
            $this->csvDelimiter = ($csvFormat->getDelimiter() ?: CsvFormatInterface::DEFAULT_DELIMITER);
            $this->csvEnclosure = ($csvFormat->getEnclosure() ?: CsvFormatInterface::DEFAULT_ENCLOSURE);
            $this->csvEscape = ($csvFormat->getEscape() ?: CsvFormatInterface::DEFAULT_ESCAPE);
        }

        return array_map(function ($data) {
            return str_getcsv($data, $this->csvDelimiter, $this->csvEnclosure, $this->csvEscape);
        }, $data);
    }
}
