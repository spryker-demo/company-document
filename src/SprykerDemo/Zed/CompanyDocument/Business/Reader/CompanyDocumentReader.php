<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business\Reader;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface;

class CompanyDocumentReader implements CompanyDocumentReaderInterface
{
    /**
     * @var \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface
     */
    protected CompanyDocumentRepositoryInterface $repository;

    /**
     * @param \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface $repository
     */
    public function __construct(
        CompanyDocumentRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsCollection(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        $companyDocumentsCollectionTransfer = new CompanyDocumentsCollectionTransfer();

        if ($companyDocumentRequestTransfer->getCompanyName()) {
            $companyDocumentsCollectionTransfer = $this->repository->getCompanyDocuments($companyDocumentRequestTransfer->getCompanyName());
        }

        return $companyDocumentsCollectionTransfer;
    }
}
