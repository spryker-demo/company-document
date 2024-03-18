<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use Orm\Zed\Company\Persistence\Map\SpyCompanyTableMap;
use Orm\Zed\FileManager\Persistence\Map\SpyFileDirectoryTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentPersistenceFactory getFactory()
 */
class CompanyDocumentRepository extends AbstractRepository implements CompanyDocumentRepositoryInterface
{
    /**
     * @module FileManager
     * @module Company
     *
     * @param array<int> $fileIds
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsByIds(array $fileIds): CompanyDocumentsCollectionTransfer
    {
        $query = $this->getFactory()
            ->getFileQuery()
            ->joinWithFileDirectory()
            ->joinWithSpyFileInfo()
            ->addJoin(SpyFileDirectoryTableMap::COL_NAME, SpyCompanyTableMap::COL_NAME, Criteria::INNER_JOIN)
            ->withColumn(SpyCompanyTableMap::COL_ID_COMPANY, CompanyDocumentTransfer::ID_COMPANY)
            ->filterByIdFile_In($fileIds);

        /** @var \Propel\Runtime\Collection\ObjectCollection $fileEntities */
        $fileEntities = $query->find();

        return $this->getFactory()
            ->createCompanyDocumentMapper()
            ->mapFileEntitiesToCompanyDocumentsCollectionTransfer($fileEntities, new CompanyDocumentsCollectionTransfer());
    }
}
