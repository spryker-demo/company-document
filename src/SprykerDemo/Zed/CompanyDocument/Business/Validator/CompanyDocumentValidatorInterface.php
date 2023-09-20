<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business\Validator;

use Generated\Shared\Transfer\FileTransfer;

interface CompanyDocumentValidatorInterface
{
    /**
     * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
     *
     * @return void
     */
    public function validateFileNameUniqueness(FileTransfer $fileTransfer): void;
}
