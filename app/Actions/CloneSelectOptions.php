<?php

declare (strict_types = 1);

namespace App\Actions;

class CloneSelectOptions
{
    public static function handle(string $content): string
    {
        $document = new \DOMDocument(encoding: 'utf-8');
        $loaded = $document->loadHTML(mb_convert_encoding(
            $content,
            'HTML-ENTITIES'
        ));
        if (!$loaded)
            return $content;
        
        $options = $document->getElementsByTagName('option');
        if ($options->length === 0)
            return $content;
        
        $selectContent = '';

        foreach ($options as $option) {
            $selectContent .= self::createOption(
                $option
            );
        }
        return $selectContent;
    }

    public static function createOption(\DOMElement $node): string
    {
        $value = $node->getAttribute('value');
        $children = $node->textContent;

        return <<<EOT
            <div class="px-2 w-full h-10 flex items-center cursor-pointer hover:bg-whisper" data-item data-value="$value">
                $children
            </div>
        EOT;
    }
}
