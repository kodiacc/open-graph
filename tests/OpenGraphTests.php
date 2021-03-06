<?php

class OpenGraphTest extends PHPUnit_Framework_TestCase
{
    
    protected function getInstance()
    {
        return new ChrisKonnertz\OpenGraph\OpenGraph();
    }

    protected function getDummy()
    {
        $og = $this->getInstance();

        $og->title('Apple Cookie')
            ->type('article')
            ->image('http://example.org/apple.jpg')
            ->description('Welcome to the best apple cookie recipe never created.')
            ->url('http://example.org/')
            ->locale('de-DE');

        return $og;
    }

    public function testBasicTags()
    {
        $og = $this->getDummy();

        $this->assertTrue($og->has('title'));
        $this->assertTrue($og->has('type'));
        $this->assertTrue($og->has('image'));
        $this->assertTrue($og->has('description'));
        $this->assertTrue($og->has('url'));
        $this->assertTrue($og->has('locale'));

        $this->assertFalse($og->has('not existing tag'));
    }

    public function testMethods()
    {
        $og = $this->getDummy();

        $og->tag('fruit', 'apple');
         $this->assertTrue($og->has('fruit'));

        $og->forget('title');
        $this->assertFalse($og->has('title'));

        $og->clear();
        $this->assertFalse($og->has('type'));
    }

    public function testRenderTags()
    {
        $og = $this->getDummy();

        $html = $og->renderTags();

        $hmtl = 'HTML: '.$og;
    }

}