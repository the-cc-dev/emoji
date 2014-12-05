<?php

namespace HeyUpdate\Emoji;

class EmojiTest extends \PHPUnit_Framework_TestCase
{
    public $emoji;

    public function setUp()
    {
        $index = new EmojiIndex();
        $this->emoji = new Emoji($index, 'http://twemoji.maxcdn.com/36x36/%s.png');
    }

    public function testEmojiReplacesUnicodeEmojiWithImage()
    {
        $replacedString = $this->emoji->replaceEmojiWithImages('I ❤ Emoji');
        $this->assertEquals('I <img src=":heart:" class="emoji" src="http://twemoji.maxcdn.com/36x36/2764.png"> Emoji', $replacedString);
    }

    public function testEmojiReplacesNamedEmojiWithImage()
    {
        $replacedString = $this->emoji->replaceEmojiWithImages('Merry Christmas :santa:');
        $this->assertEquals('Merry Christmas <img src=":santa:" class="emoji" src="http://twemoji.maxcdn.com/36x36/1f385.png">', $replacedString);
    }
}
