<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\CompanyDocument;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerDemo\Client\CompanyDocument\CompanyDocumentFactory getFactory()
 */
class CompanyDocumentClient extends AbstractClient implements CompanyDocumentClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        return $this->getFactory()
            ->createZedStub()
            ->getCompanyDocuments($companyDocumentRequestTransfer);
    }
}
