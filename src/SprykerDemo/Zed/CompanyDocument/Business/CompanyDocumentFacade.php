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
use Generated\Shared\Transfer\FileTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Business\CompanyDocumentBusinessFactory getFactory()
 */
class CompanyDocumentFacade extends AbstractFacade implements CompanyDocumentFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentCollection(CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        return $this->getFactory()
            ->createCompanyDocumentReader()
            ->getCompanyDocumentCollection($companyDocumentsRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function getCompanyDocument(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentTransfer
    {
        return $this->getFactory()
            ->createCompanyDocumentReader()
            ->getCompanyDocument($companyDocumentRequestTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
     *
     * @return void
     */
    public function validateFileNameUniqueness(FileTransfer $fileTransfer): void
    {
        $this->getFactory()
            ->createCompanyDocumentValidator()
            ->validateFileNameUniqueness($fileTransfer);
    }
}
