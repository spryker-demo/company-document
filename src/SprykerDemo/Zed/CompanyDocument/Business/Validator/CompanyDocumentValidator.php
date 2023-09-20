<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business\Validator;

use Generated\Shared\Transfer\FileTransfer;
use SprykerDemo\Service\CompanyDocument\Exception\DuplicateFileNameException;
use SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface;

class CompanyDocumentValidator implements CompanyDocumentValidatorInterface
{
    /**
     * @var \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface
     */
    protected CompanyDocumentRepositoryInterface $repository;

    /**
     * @param \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface $repository
     */
    public function __construct(
        CompanyDocumentRepositoryInterface $repository
    ) {
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
     *
     * @throws \SprykerDemo\Service\CompanyDocument\Exception\DuplicateFileNameException
     *
     * @return void
     */
    public function validateFileNameUniqueness(FileTransfer $fileTransfer): void
    {
        if ($this->repository->checkFileNameExistence($fileTransfer)) {
            throw new DuplicateFileNameException('The file name "' . $fileTransfer->getFileName() . '" already exists in this directory!.');
        }
    }
}
