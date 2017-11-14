<?php
namespace TakaakiMizuno\SwaggerParser\Tests;

use TakaakiMizuno\SwaggerParser\Parser;

class ParserTest extends Base
{
    public function testParseClass()
    {
        $parser = new Parser();
        $doc    = $parser->parseFile(__DIR__.'/data/petshop.yaml');

        $this->assertEquals('2.0', $doc->swagger);
    }

    public function testGetPaths()
    {
        $parser = new Parser();
        $doc    = $parser->parseFile(__DIR__.'/data/petshop.yaml');

        $paths = $doc->paths;
        $this->assertNotEmpty($paths);
        foreach ($paths as $name => $path) {
            print $name.PHP_EOL;
            foreach ($path as $method => $info) {
                print $method.PHP_EOL;
            }
        }
    }
}
