<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface getRepository()
 */
interface CompanyDocumentFacadeInterface
{
    /**
     * Specification:
     * - Gets a collection of company documents by company document ids.
     * - Company document ids are the same as file ids.
     *
     * @api
     *
     * @param array<int> $companyDocumentIds
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsCollectionByCompanyDocumentIds(array $companyDocumentIds): CompanyDocumentsCollectionTransfer;
}
