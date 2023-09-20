<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Communication\Plugin;

use Generated\Shared\Transfer\FileTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerDemo\Zed\FileManager\Dependency\Plugin\FilePreSaveValidatorPluginInterface;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Business\CompanyDocumentFacadeInterface getFacade()
 */
class FileUniqueNamePreSaveValidatorPlugin extends AbstractPlugin implements FilePreSaveValidatorPluginInterface
{
 /**
  * {@inheritDoc}
  * - Validates if filename is unique in the same directory before saving file.
  *
  * @api
  *
  * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
  *
  * @return void
  */
    public function validate(FileTransfer $fileTransfer): void
    {
        $this->getFacade()->validateFileNameUniqueness($fileTransfer);
    }
}
