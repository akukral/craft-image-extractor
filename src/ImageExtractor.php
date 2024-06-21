<?php

namespace akukral\craftimageextrator;

use Craft;
use craft\base\Plugin;
use craft\elements\Entry;
use craft\base\Field;
use akukral\craftimageextrator\services\ImageExtractorService;
use akukral\craftimageextrator\behaviors\ImageExtractorBehavior;

/**
 * Image Extrator plugin
 *
 * @method static ImageExtractor getInstance()
 * @author Allan Kukral <me@allankukral.com>
 * @copyright Allan Kukral
 * @license https://craftcms.github.io/license/ Craft License
 */
class ImageExtractor extends Plugin
{
    public string $schemaVersion = '1.0.0';

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init()
    {
        parent::init();

        $this->setComponents([
            'imageExtractorService' => ImageExtractorService::class,
        ]);

        // Attach behavior to Entry and Field models
        Event::on(
            Entry::class,
            Entry::EVENT_INIT,
            function (Event $event) {
                $event->sender->attachBehavior('imageExtractor', ImageExtractorBehavior::class);
            }
        );

        Event::on(
            Field::class,
            Field::EVENT_INIT,
            function (Event $event) {
                $event->sender->attachBehavior('imageExtractor', ImageExtractorBehavior::class);
            }
        );
    }

    private function attachEventHandlers(): void
    {
        // Register event handlers here ...
        // (see https://craftcms.com/docs/4.x/extend/events.html to get started)
    }

}
