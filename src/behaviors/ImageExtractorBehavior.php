<?php
namespace akukral\craftimageextractor\behaviors;

use yii\base\Behavior;
use akukral\craftimageextractor\ImageExtractor;
use Craft;

class ImageExtractorBehavior extends Behavior
{
    public function getAllImages()
    {
        Craft::info('getAllImages method called on ' . get_class($this->owner), 'craft-image-extractor');
        return ImageExtractor::getInstance()->imageExtractorService->getAllImages($this->owner);
    }
}
