<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Orm\Zed\FileManager\Persistence\Map\SpyFileTableMap;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentPersistenceFactory getFactory()
 */
class CompanyDocumentRepository extends AbstractRepository implements CompanyDocumentRepositoryInterface
{
    /**
     * @param string $companyName
     *
     * @return array<int>
     */
    public function getCompanyDocumentIds(string $companyName): array
    {
        return $this->getFactory()
            ->getFileQuery()
            ->select(SpyFileTableMap::COL_ID_FILE)
            ->joinWithFileDirectory()
            ->useFileDirectoryQuery()
                ->filterByName($companyName)
            ->endUse()
            ->find()
            ->toArray();
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return bool
     */
    public function checkFileExistence(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): bool
    {
        return $this->getFactory()
            ->getFileQuery()
            ->filterByIdFile($companyDocumentRequestTransfer->getIdFile())
            ->joinWithFileDirectory()
            ->useFileDirectoryQuery()
                ->filterByName($companyDocumentRequestTransfer->getCompanyName())
            ->endUse()
            ->exists();
    }
}
