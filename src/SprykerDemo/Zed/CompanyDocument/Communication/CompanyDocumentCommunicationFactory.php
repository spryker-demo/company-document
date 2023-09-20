<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Communication;

use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidator;
use SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidatorInterface;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface getRepository()
 */
class CompanyDocumentCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidatorInterface
     */
    public function createCompanyDocumentValidator(): CompanyDocumentValidatorInterface
    {
        return new CompanyDocumentValidator(
            $this->getRepository(),
        );
    }
}
