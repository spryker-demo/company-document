<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\FileTransfer;

interface CompanyDocumentRepositoryInterface
{
    /**
     * @param string $companyName
     *
     * @return array<int>
     */
    public function getCompanyDocumentIds(string $companyName): array;

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return bool
     */
    public function checkFileExistence(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): bool;

    /**
     * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
     *
     * @return bool
     */
    public function checkFileNameExistence(FileTransfer $fileTransfer): bool;
}
