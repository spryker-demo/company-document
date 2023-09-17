<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Client\CompanyDocument;

use Spryker\Client\Kernel\AbstractFactory;

class CompanyDocumentFactory extends AbstractFactory
{
    /**
     * @return \Pyz\Client\CompanyDocument\Zed\CompanyDocumentStubInterface
     */
    public function createZedStub(): CompanyDocumentStubInterface
    {
        return new CompanyDocumentStub($this->getZedRequestClient());
    }

    /**
     * @return \Spryker\Client\ZedRequest\ZedRequestClientInterface
     */
    private function getZedRequestClient(): ZedRequestClientInterface
    {
        return $this->getProvidedDependency(CompanyDocumentDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
