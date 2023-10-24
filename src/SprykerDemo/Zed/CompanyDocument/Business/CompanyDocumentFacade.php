<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface getRepository()
 */
class CompanyDocumentFacade extends AbstractFacade implements CompanyDocumentFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param array<int> $companyDocumentIds
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsCollectionByCompanyDocumentIds(array $companyDocumentIds): CompanyDocumentsCollectionTransfer
    {
        return $this->getRepository()->getCompanyDocumentsByIds($companyDocumentIds);
    }
}
