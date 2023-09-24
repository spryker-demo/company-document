<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\FileTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \SprykerDemo\Zed\CompanyDocument\Persistence\CompanyDocumentPersistenceFactory getFactory()
 */
class CompanyDocumentRepository extends AbstractRepository implements CompanyDocumentRepositoryInterface
{
    /**
     * @param string $companyName
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function getCompanyDocuments(string $companyName): CompanyDocumentsCollectionTransfer
    {
        $spyFileEntities = $this->getFactory()
            ->getFileQuery()
            ->joinWithSpyFileInfo()
            ->joinWithFileDirectory()
                ->useFileDirectoryQuery()
                    ->filterByName($companyName)
                ->endUse()
            ->find();

        return $this->getFactory()
            ->createCompanyDocumentMapper()
            ->mapSpyFileEntitiesToCompanyDocumentsCollectionTransfer($spyFileEntities);
    }

    /**
     * @param \Generated\Shared\Transfer\FileTransfer $fileTransfer
     *
     * @return bool
     */
    public function checkFileNameExistence(FileTransfer $fileTransfer): bool
    {
        return $this->getFactory()
            ->getFileQuery()
            ->filterByFileName($fileTransfer->getFileName())
            ->filterByFkFileDirectory($fileTransfer->getFkFileDirectory())
            ->exists();
    }
}
