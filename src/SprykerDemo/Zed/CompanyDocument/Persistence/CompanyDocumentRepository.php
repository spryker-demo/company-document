<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentCriteriaTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use Generated\Shared\Transfer\FilterTransfer;
use Orm\Zed\Company\Persistence\Map\SpyCompanyTableMap;
use Orm\Zed\FileManager\Persistence\Map\SpyFileDirectoryTableMap;
use Orm\Zed\FileManager\Persistence\SpyFileQuery;
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

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(
        CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer
    ): CompanyDocumentsCollectionTransfer {
        $fileQuery = $this->getFactory()
            ->getFileQuery()
            ->joinFileDirectory()
            ->joinSpyFileInfo()
            ->addJoin(SpyFileDirectoryTableMap::COL_NAME, SpyCompanyTableMap::COL_NAME, Criteria::INNER_JOIN)
            ->withColumn(SpyCompanyTableMap::COL_ID_COMPANY, CompanyDocumentTransfer::ID_COMPANY);

        $fileQuery = $this->applyCriteria($companyDocumentCriteriaTransfer, $fileQuery);

        /** @var \Propel\Runtime\Collection\ObjectCollection $fileEntities */
        $fileEntities = $fileQuery->find();

        return $this->getFactory()
            ->createCompanyDocumentMapper()
            ->mapFileEntitiesToCompanyDocumentsCollectionTransfer($fileEntities, new CompanyDocumentsCollectionTransfer());
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer
     * @param \Orm\Zed\FileManager\Persistence\SpyFileQuery $fileQuery
     *
     * @return \Orm\Zed\FileManager\Persistence\SpyFileQuery
     */
    protected function applyCriteria(
        CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer,
        SpyFileQuery $fileQuery
    ): SpyFileQuery {
        if ($companyDocumentCriteriaTransfer->getFilter()) {
            $fileQuery = $this->applyFilter($companyDocumentCriteriaTransfer->getFilter(), $fileQuery);
        }

        return $fileQuery;
    }

    /**
     * @param \Generated\Shared\Transfer\FilterTransfer $filterTransfer
     * @param \Orm\Zed\FileManager\Persistence\SpyFileQuery $fileQuery
     *
     * @return \Orm\Zed\FileManager\Persistence\SpyFileQuery
     */
    protected function applyFilter(FilterTransfer $filterTransfer, SpyFileQuery $fileQuery): SpyFileQuery
    {
        if ($filterTransfer->getLimit() !== null) {
            $fileQuery->limit($filterTransfer->getLimit());
        }

        if ($filterTransfer->getOffset() !== null) {
            $fileQuery->offset($filterTransfer->getOffset());
        }

        if ($filterTransfer->getOrderBy()) {
            $fileQuery->orderBy($filterTransfer->getOrderBy(), $filterTransfer->getOrderDirection() ?? Criteria::ASC);
        }

        return $fileQuery;
    }
}
