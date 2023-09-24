<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\CompanyDocument\Zed;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Spryker\Client\ZedRequest\Stub\ZedRequestStub;

class CompanyDocumentStub extends ZedRequestStub implements CompanyDocumentStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        /** @var \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer $companyDocumentsCollectionTransfer */
        $companyDocumentsCollectionTransfer = $this->zedStub->call('/company-document/gateway/get-company-documents', $companyDocumentRequestTransfer);

        return $companyDocumentsCollectionTransfer;
    }
}
