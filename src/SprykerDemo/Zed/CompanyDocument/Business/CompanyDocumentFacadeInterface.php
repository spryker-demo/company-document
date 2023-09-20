<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentsRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidatorInterface;

interface CompanyDocumentFacadeInterface
{
    /**
     * Specification:
     * - Gets all documents inside a folder with the same company name.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentCollection(CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer): CompanyDocumentsCollectionTransfer;

    /**
     * Specification:
     * - Gets one document by id inside a folder with company name.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function getCompanyDocument(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentTransfer;

    /**
     * Specification:
     * - Creates new CompanyDocumentValidator class.
     *
     * @api
     *
     * @return \SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidatorInterface
     */
    public function createCompanyDocumentValidator(): CompanyDocumentValidatorInterface;
}
