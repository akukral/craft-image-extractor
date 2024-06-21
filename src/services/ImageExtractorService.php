<?php
namespace akukral\craftimageextrator\services;

use Craft;
use craft\base\Component;
use craft\elements\Asset;
use craft\elements\MatrixBlock;
use craft\elements\db\AssetQuery;
use craft\base\Element;
use craft\base\Field;
use craft\fields\Matrix as MatrixField;

class ImageExtractorService extends Component
{
    public function getAllImages($element)
    {
        if ($element instanceof Field) {
            return $this->getImagesFromField($element->owner, $element);
        }

        $images = [];

        foreach ($element->getFieldLayout()->getCustomFields() as $field) {
            $images = array_merge($images, $this->getImagesFromField($element, $field));
        }

        return $images;
    }

    private function getImagesFromField(Element $element, Field $field)
    {
        $images = [];
        $value = $element->getFieldValue($field->handle);

        if ($value instanceof Asset && $value->kind === 'image') {
            $images[] = $value;
        } elseif ($value instanceof AssetQuery) {
            $images = array_merge($images, $value->kind('image')->all());
        } elseif ($field instanceof MatrixField) {
            foreach ($element->getFieldValue($field->handle)->all() as $block) {
                $images = array_merge($images, $this->getAllImages($block));
            }
        } elseif (is_array($value)) {
            foreach ($value as $item) {
                if ($item instanceof Asset && $item->kind === 'image') {
                    $images[] = $item;
                } elseif ($item instanceof Element) {
                    $images = array_merge($images, $this->getAllImages($item));
                }
            }
        }

        return $images;
    }
}
