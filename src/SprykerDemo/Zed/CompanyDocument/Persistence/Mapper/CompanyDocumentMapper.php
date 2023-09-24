<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\CompanyDocument\Persistence\Mapper;

use Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer;
use Generated\Shared\Transfer\CompanyDocumentTransfer;

class CompanyDocumentMapper
{
    /**
     * @param array<\Orm\Zed\FileManager\Persistence\SpyFile> $files
     *
     * @return \Generated\Shared\Transfer\CompanyDocumentsCollectionTransfer
     */
    public function mapSpyFileEntitiesToCompanyDocumentsCollectionTransfer(array $files): CompanyDocumentsCollectionTransfer
    {
        $companyDocumentsCollectionTransfer = new CompanyDocumentsCollectionTransfer();

        foreach ($files as $file) {
            $companyDocumentTransfer = new CompanyDocumentTransfer();
            $companyDocumentTransfer->setFileName($file['FileName']);
            $companyDocumentTransfer->setIdFile($file['IdFile']);
            $companyDocumentTransfer->setCreatedAt($file['SpyFileInfos'][0]['CreatedAt']);

            $companyDocumentsCollectionTransfer->addDocument($companyDocumentTransfer);
        }

        return $companyDocumentsCollectionTransfer;
    }
}
