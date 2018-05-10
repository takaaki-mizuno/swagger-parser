<?php
namespace TakaakiMizuno\SwaggerParser;

use Symfony\Component\Yaml\Yaml;
use TakaakiMizuno\SwaggerParser\Exceptions\InvalidFormatException;
use TakaakiMizuno\SwaggerParser\Objects\V20\Document as V20Document;

class Parser
{
    const FORMAT_YAML = 'yaml';
    const FORMAT_JSON = 'json';

    private $enforceRequired = true;

    public function __construct(bool $enforceRequired = true)
    {
        $this->enforceRequired = $enforceRequired;
    }

    public function parse($data)
    {
        $format  = $this->detectFormat($data);
        $rawData = null;
        switch ($format) {
            case self::FORMAT_YAML:
                $rawData = Yaml::parse($data);
                break;
            case self::FORMAT_JSON:
                $rawData = json_decode($data, true);
                break;
        }
        if (!empty($rawData)) {
            $version = $this->detectOpenAPIVersion($rawData);
            switch ($version) {
                case '20':
                    return new V20Document($rawData, 'Document', $this->enforceRequired);
            }
        }

        return null;
    }

    public function parseFile($file)
    {
        $data = file_get_contents($file);

        return $this->parse($data);
    }

    protected function detectFormat($data)
    {
        if (substr(trim($data), 0, 1) == '{') {
            return self::FORMAT_JSON;
        }

        return self::FORMAT_YAML;
    }

    protected function detectOpenAPIVersion($rawData)
    {
        if (array_key_exists('swagger', $rawData)) {
            return '20';
        }
        if (array_key_exists('openapi', $rawData)) {
            return '30';
        }

        throw new InvalidFormatException('Cannot Detect Version');
    }
}
