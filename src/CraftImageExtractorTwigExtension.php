<?php
namespace akukral\craftimageextractor;

use akukral\craftimageextractor\behaviors\ImageExtractorBehavior;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Craft;

class CraftImageExtractorTwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('craftImageExtractor', [$this, 'getCraftImageExtractor']),
        ];
    }

    public function getCraftImageExtractor()
    {
        Craft::info('getCraftImageExtractor called', 'craft-image-extractor');
        return new class {
            public function getImageExtractorBehavior()
            {
                Craft::info('getImageExtractorBehavior called', 'craft-image-extractor');
                return new ImageExtractorBehavior();
            }
        };
    }
}
