<?php
namespace App\Waves;

//use jamesbolitho\frontenduploadfield\UploadField;
use ZipArchive;
use PageController;
use ZipStream\ZipStream;

/**
 * Class \App\Docs\DocsPageController
 *
 * @property \App\Waves\WavesPage $dataRecord
 * @method \App\Waves\WavesPage data()
 * @mixin \App\Waves\WavesPage
 */
class WavesPageController extends PageController
{

    private static $allowed_actions = [
        'view',
        'download',
    ];

    public function getAssetTypes()
    {
        return WavesAssetType::get();
    }

    public function getWaveProducts()
    {
        return WavesProduct::get();
    }

    public function download()
    {
        $asset = WavesProduct::get()->byID($this->getRequest()->param('ID'));

        if ($asset) {
            if ($asset->AssetType()->Title == 'Material') {

                // create a new zipstream object
                $zip = new ZipStream(
                    outputName: $asset->Title . '_material.zip',
                    // enable output of HTTP headers
                    sendHttpHeaders: true,
                );

                if ($asset->DiffuseTexture()->exists()) {
                    $zip->addFileFromPath(
                        fileName: $asset->Title . '_diffuse.png',
                        path: "./assets/" . $asset->DiffuseTexture()->Filename,
                    );
                }
                if ($asset->AmbientOcclusionTexture()->exists()) {
                    $zip->addFileFromPath(
                        fileName: $asset->Title . '_ao.png',
                        path: "./assets/" . $asset->AmbientOcclusionTexture()->Filename,
                    );
                }
                if ($asset->DisplacementTexture()->exists()) {
                    $zip->addFileFromPath(
                        fileName: $asset->Title . '_displacement.png',
                        path: "./assets/" . $asset->DisplacementTexture()->Filename,
                    );
                }
                if ($asset->NormalTexture()->exists()) {
                    $zip->addFileFromPath(
                        fileName: $asset->Title . '_normal.png',
                        path: "./assets/" . $asset->NormalTexture()->Filename,
                    );
                }
                if ($asset->SpecularTexture()->exists()) {
                    $zip->addFileFromPath(
                        fileName: $asset->Title . '_specular.png',
                        path: "./assets/" . $asset->SpecularTexture()->Filename,
                    );
                }

                // finish the zip stream
                $zip->finish();
            }
        }
    }
}
