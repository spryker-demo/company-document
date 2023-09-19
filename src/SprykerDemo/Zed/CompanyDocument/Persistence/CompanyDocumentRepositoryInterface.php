<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

interface CompanyDocumentRepositoryInterface
{
    /**
     * @param string $companyName
     *
     * @return array<int>
     */
    public function getCompanyDocumentIds(string $companyName): array;
}
