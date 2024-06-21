<?php
namespace akukral\craftimageextractor;

use Craft;
use craft\base\Plugin;
use craft\elements\Entry;
use craft\base\Field;
use craft\events\DefineBehaviorsEvent;
use akukral\craftimageextractor\services\ImageExtractorService;
use akukral\craftimageextractor\behaviors\ImageExtractorBehavior;
use yii\base\Event;

class ImageExtractor extends Plugin
{
    public function init()
    {
        parent::init();

        $this->setComponents([
            'imageExtractorService' => ImageExtractorService::class,
        ]);

        // Attach behavior to Entry models
        Event::on(
            Entry::class,
            Entry::EVENT_DEFINE_BEHAVIORS,
            function (DefineBehaviorsEvent $event) {
                $event->behaviors['imageExtractor'] = ImageExtractorBehavior::class;
            }
        );

        // Attach behavior to Field models
        Event::on(
            Field::class,
            Field::EVENT_DEFINE_BEHAVIORS,
            function (DefineBehaviorsEvent $event) {
                $event->behaviors['imageExtractor'] = ImageExtractorBehavior::class;
            }
        );

        // Register our Twig extension
        Craft::$app->view->registerTwigExtension(new CraftImageExtractorTwigExtension());
    }
}
