<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentPersistenceFactory getFactory()
 */
class CompanyDocumentRepository extends AbstractRepository implements CompanyDocumentRepositoryInterface
{
    /**
     * @param string $companyName
     *
     * @return array<int>
     */
    public function getCompanyDocumentIds(string $companyName): array
    {
        $directories = $this->getFactory()
            ->getFileDirectoryQuery()
            ->findByName($companyName);

        if ($directories->count() === 0) {
            return [];
        }

        $primaryKeys = [];

        foreach ($directories as $directory) {
            $primaryKeys[] = array_values($directory->getSpyFiles()->getPrimaryKeys());
        }

        return array_merge(...$primaryKeys);
    }
}
