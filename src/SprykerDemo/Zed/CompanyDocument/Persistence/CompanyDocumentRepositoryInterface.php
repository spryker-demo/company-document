<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentCriteriaTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentPersistenceFactory getFactory()
 */
interface CompanyDocumentRepositoryInterface
{
    /**
     * @module FileManager
     * @module Company
     *
     * @param array<int> $fileIds
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsByIds(array $fileIds): CompanyDocumentsCollectionTransfer;

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(
        CompanyDocumentCriteriaTransfer $companyDocumentCriteriaTransfer
    ): CompanyDocumentsCollectionTransfer;
}
