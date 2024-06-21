<?php
namespace akukral\craftimageextractor\twigextensions;

use akukral\craftimageextractor\ImageExtractor;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageExtractorTwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('getAllImages', [$this, 'getAllImages']),
        ];
    }

    public function getAllImages($element)
    {
        return ImageExtractor::getInstance()->imageExtractorService->getAllImages($element);
    }
}
