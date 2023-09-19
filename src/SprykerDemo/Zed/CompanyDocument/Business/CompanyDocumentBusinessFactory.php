<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerDemo\Zed\CompanyDocument\Business\Reader\CompanyDocumentReader;
use SprykerDemo\Zed\CompanyDocument\CompanyDocumentDependencyProvider;
use SprykerDemo\Zed\FileManager\Business\FileManagerFacadeInterface;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface getRepository()
 */
class CompanyDocumentBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerDemo\Zed\FileManager\Business\FileManagerFacadeInterface
     */
    public function getFileManager(): FileManagerFacadeInterface
    {
        return $this->getProvidedDependency(CompanyDocumentDependencyProvider::SERVICE_FILE_SYSTEM);
    }

    /**
     * @return \SprykerDemo\Zed\CompanyDocument\Business\Reader\CompanyDocumentReader
     */
    public function createCompanyDocumentReader(): CompanyDocumentReader
    {
        return new CompanyDocumentReader(
            $this->getRepository(),
            $this->getFileManager(),
        );
    }
}
