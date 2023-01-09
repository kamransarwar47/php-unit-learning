<?php

use App\src\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    protected function setUp(): void
    {
        $this->article = new Article();
    }

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame("", $this->article->getSlug());
    }

    /*public function testSlugHasSpacesReplacedByUnderscores()
    {
        $this->article->title = "An example article";
        $this->assertEquals("an_example_article", $this->article->getSlug());
    }

    public function testSlugHasWhitespacesReplacedBySingleUnderscore()
    {
        $this->article->title = "An   example  \n  article";
        $this->assertEquals("an_example_article", $this->article->getSlug());
    }

    public function testSlugDoesNotHaveAnyNonWordCharacters()
    {
        $this->article->title = "An @ ! example article!";
        $this->assertEquals("an_example_article", $this->article->getSlug());
    }*/

    public function titleProvider()
    {
        return [
            'testSlugHasSpacesReplacedByUnderscores' => ["An example article", "an_example_article"],
            'testSlugHasWhitespacesReplacedBySingleUnderscore' => ["An   example  \n  article", "an_example_article"],
            'testSlugDoesNotHaveAnyNonWordCharacters' => ["An @ ! example article!", "an_example_article"],
            'testSlugDoesNotHaveAnyWhitespacesAroundIt' => [" An example article ", "an_example_article "],
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug)
    {
        $this->article->title = $title;
        $this->assertEquals($slug, $this->article->getSlug());
    }
}