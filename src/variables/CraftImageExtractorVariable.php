<?php
namespace akukral\craftimageextractor\variables;

use akukral\craftimageextractor\ImageExtractor;
use akukral\craftimageextractor\behaviors\ImageExtractorBehavior;

class CraftImageExtractorVariable
{
    public function getImageExtractorBehavior()
    {
        return new ImageExtractorBehavior();
    }
}
