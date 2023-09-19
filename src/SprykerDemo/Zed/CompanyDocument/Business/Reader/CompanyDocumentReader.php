<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Business\Reader;

use ArrayObject;
use Generated\Shared\Transfer\CompanyDocumentRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentsRequestTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface;
use SprykerDemo\Zed\FileManager\Business\FileManagerFacadeInterface;

class CompanyDocumentReader implements CompanyDocumentReaderInterface
{
    /**
     * @var \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface
     */
    protected CompanyDocumentRepositoryInterface $repository;

    /**
     * @var \SprykerDemo\Zed\FileManager\Business\FileManagerFacadeInterface
     */
    protected FileManagerFacadeInterface $fileManager;

    /**
     * @param \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentRepositoryInterface $repository
     * @param \SprykerDemo\Zed\FileManager\Business\FileManagerFacadeInterface $fileManager
     */
    public function __construct(
        CompanyDocumentRepositoryInterface $repository,
        FileManagerFacadeInterface $fileManager
    ) {
        $this->repository = $repository;
        $this->fileManager = $fileManager;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocumentsCollection(CompanyDocumentsRequestTransfer $companyDocumentsRequestTransfer): CompanyDocumentsCollectionTransfer
    {
        $companyDocumentsCollectionTransfer = new CompanyDocumentsCollectionTransfer();

        if ($companyDocumentsRequestTransfer->getCompanyName()) {
            $ids = $this->repository->getCompanyDocumentIds($companyDocumentsRequestTransfer->getCompanyName());
            $files = $this->fileManager->getFilesByIds($ids);

            foreach ($files as $file) {
                $file->setContent('');
            }
            $companyDocumentsCollectionTransfer->setFiles(new ArrayObject($files));
        }

        return $companyDocumentsCollectionTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function getCompanyDocument(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentTransfer
    {
        $companyDocumentTransfer = new CompanyDocumentTransfer();
        if ($companyDocumentRequestTransfer->getCompanyName()) {
            $availableFileIds = $this->repository->getCompanyDocumentIds($companyDocumentRequestTransfer->getCompanyName());
            $availableFileIds = array_map('intval', $availableFileIds);
            if (in_array((int)$companyDocumentRequestTransfer->getIdFile(), $availableFileIds, true) && $companyDocumentRequestTransfer->getIdFile()) {
                $file = $this->fileManager->findFileByIdFile($companyDocumentRequestTransfer->getIdFile());
                if ($file->getContent()) {
                    $file->setContent(base64_encode($file->getContent()));
                    $companyDocumentTransfer->setFile($file);
                }
            }
        }

        return $companyDocumentTransfer;
    }
}
