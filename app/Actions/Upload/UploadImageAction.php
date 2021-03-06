<?php

namespace App\Actions\Upload;


class UploadImageAction
{
    /**
     * Store a new category in storage.
     *
     * @param object $file
     * @param string $destination_path
     * @return Category
     */
    public function execute(object $file)
    {
        // $destination_path = 'public/files';
        $file_name = time() . '-' . $file->getClientOriginalName();
        return $file->storeAs('files', $file_name,['disk'=>'public']);

    }
}
