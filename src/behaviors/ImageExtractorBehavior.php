<?php
namespace akukral\craftimageextrator\behaviors;

use yii\base\Behavior;
use akukral\craftimageextrator\ImageExtractor;

class ImageExtractorBehavior extends Behavior
{
    public function getAllImages()
    {
        return ImageExtractor::getInstance()->imageExtractorService->getAllImages($this->owner);
    }
}
