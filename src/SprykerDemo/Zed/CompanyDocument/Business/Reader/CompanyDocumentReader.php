<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
     * @var CompanyDocumentRepositoryInterface
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
        $ids = $this->repository->getCompanyDocumentIds($companyDocumentsRequestTransfer->getCompanyName());
        $files = $this->fileManager->getFilesByIds($ids);

        foreach ($files as &$file) {
            $file->setContent('');
        }

        return (new CompanyDocumentsCollectionTransfer())->setFiles(new ArrayObject($files));
    }

    /**
     * @param \Generated\Shared\Transfer\CompanyDocumentRequestTransfer $companyDocumentRequestTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function getCompanyDocument(CompanyDocumentRequestTransfer $companyDocumentRequestTransfer): CompanyDocumentTransfer
    {
        $availableFileIds = $this->repository->getCompanyDocumentIds($companyDocumentRequestTransfer->getCompanyName());
        $availableFileIds = array_map('intval', $availableFileIds);
        if (!in_array((int)$companyDocumentRequestTransfer->getIdFile(), $availableFileIds, true)) {
            return new CompanyDocumentTransfer();
        }
        $file = $this->fileManager->findFileByIdFile($companyDocumentRequestTransfer->getIdFile());
        $file->setContent(base64_encode($file->getContent()));

        return (new CompanyDocumentTransfer())->setFile($file);
    }
}
