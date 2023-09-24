<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;
use Propel\Runtime\Collection\ObjectCollection;

class CompanyDocumentMapper
{
    /**
     * @param \Propel\Runtime\Collection\ObjectCollection $files
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function mapSpyFileEntitiesToCompanyDocumentsCollectionTransfer(ObjectCollection $files): CompanyDocumentsCollectionTransfer
    {
        $companyDocumentsCollectionTransfer = new CompanyDocumentsCollectionTransfer();

        foreach ($files as $file) {
            $companyDocumentTransfer = new CompanyDocumentTransfer();
            $companyDocumentTransfer->setFileName($file->getFileName());
            $companyDocumentTransfer->setIdFile($file->getIdFile());
            $companyDocumentTransfer->setCreatedAt(($file->getSpyFileInfos()->getFirst()?->getCreatedAt())->format('Y-m-d H:i:s'));

            $companyDocumentsCollectionTransfer->addDocument($companyDocumentTransfer);
        }

        return $companyDocumentsCollectionTransfer;
    }
}
