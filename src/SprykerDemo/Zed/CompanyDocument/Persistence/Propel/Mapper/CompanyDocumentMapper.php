<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use Orm\Zed\FileManager\Persistence\SpyFile;
use Propel\Runtime\Collection\ObjectCollection;

class CompanyDocumentMapper
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection<\Orm\Zed\FileManager\Persistence\SpyFile> $fileEntities
     * @param \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer $companyDocumentsCollectionTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function mapFileEntitiesToCompanyDocumentsCollectionTransfer(
        ObjectCollection $fileEntities,
        CompanyDocumentsCollectionTransfer $companyDocumentsCollectionTransfer
    ): CompanyDocumentsCollectionTransfer {
        foreach ($fileEntities as $fileEntity) {
            $companyDocumentTransfer = $this->mapFileEntityToCompanyDocumentTransfer($fileEntity, new CompanyDocumentTransfer());
            $companyDocumentsCollectionTransfer->addDocument($companyDocumentTransfer);
        }

        return $companyDocumentsCollectionTransfer;
    }

    /**
     * @param \Orm\Zed\FileManager\Persistence\SpyFile $fileEntity
     * @param \Generated\Shared\Transfer\CompanyDocumentTransfer $companyDocumentTransfer
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentTransfer
     */
    public function mapFileEntityToCompanyDocumentTransfer(SpyFile $fileEntity, CompanyDocumentTransfer $companyDocumentTransfer): CompanyDocumentTransfer
    {
        $companyDocumentTransfer->setIdFile($fileEntity->getIdFile());
        $companyDocumentTransfer->setFileName($fileEntity->getFileName());
        $fileInfoEntities = $fileEntity->getSpyFileInfos();
        $companyDocumentTransfer->setCreatedAt($fileInfoEntities[0]->getCreatedAt());
        $companyDocumentTransfer->setIdCompany($fileEntity->getVirtualColumn(CompanyDocumentTransfer::ID_COMPANY));

        return $companyDocumentTransfer;
    }
}
