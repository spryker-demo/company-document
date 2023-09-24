<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerDemo\Zed\CompanyDocument\Business\Reader\CompanyDocumentReader;
use SprykerDemo\Zed\CompanyDocument\Business\Reader\CompanyDocumentReaderInterface;
use SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidator;
use SprykerDemo\Zed\CompanyDocument\Business\Validator\CompanyDocumentValidatorInterface;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface getRepository()
 */
class CompanyDocumentBusinessFactory extends AbstractBusinessFactory
{
 /**
  * @return \SprykerDemo\Zed\CompanyDocument\Business\Reader\CompanyDocumentReaderInterface
  */
    public function createCompanyDocumentReader(): CompanyDocumentReaderInterface
    {
        return new CompanyDocumentReader(
            $this->getRepository(),
        );
    }

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
