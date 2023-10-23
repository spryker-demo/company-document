<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Orm\Zed\FileManager\Persistence\SpyFileQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;
use SprykerDemo\Zed\CompanyDocument\CompanyDocumentDependencyProvider;
use SprykerDemo\Zed\CompanyDocument\Persistence\Propel\Mapper\CompanyDocumentMapper;

class CompanyDocumentPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \SprykerDemo\Zed\CompanyDocument\Persistence\Propel\Mapper\CompanyDocumentMapper
     */
    public function createCompanyDocumentMapper(): CompanyDocumentMapper
    {
        return new CompanyDocumentMapper();
    }

    /**
     * @return \Orm\Zed\FileManager\Persistence\SpyFileQuery
     */
    public function getFileQuery(): SpyFileQuery
    {
        return $this->getProvidedDependency(CompanyDocumentDependencyProvider::QUERY_FILE);
    }
}
