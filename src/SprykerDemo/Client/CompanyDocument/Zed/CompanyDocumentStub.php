<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\CompanyDocument\Zed;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentsRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class CompanyDocumentStub extends ZedRequestStub implements CompanyDocumentStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer $companyDocumentsCollectionTransfer */
        $companyDocumentsCollectionTransfer = $this->zedStub->call('/company-document/gateway/get-company-documents', $companyDocumentsRequestTransfer);

        return $companyDocumentsCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function getCompanyDocument(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyDocumentTransfer $companyDocumentTransfer */
        $companyDocumentTransfer = $this->zedStub->call('/company-document/gateway/download-company-documents', $companyDocumentRequestTransfer);

        return $companyDocumentTransfer;
    }
}
