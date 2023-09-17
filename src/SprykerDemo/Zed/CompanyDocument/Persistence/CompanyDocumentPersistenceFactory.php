<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Orm\Zed\FileManager\Persistence\SpyFileDirectoryQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use SprykerDemo\Zed\CompanyDocument\CompanyDocumentDependencyProvider;

class CompanyDocumentPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\FileManager\Persistence\SpyFileDirectoryQuery
     */
    public function getFileDirectoryQuery(): SpyFileDirectoryQuery
    {
        return $this->getProvidedDependency(CompanyDocumentDependencyProvider::QUERY_FILE_DIRECTORY);
    }
}
