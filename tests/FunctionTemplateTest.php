<?php

/**
 * Created by PhpStorm.
 * User: mdiaconita
 * Date: 25/05/2017
 * Time: 10:26
 */
class FunctionTemplateTest extends PHPUnit_Framework_TestCase
{
	public function test_exists_displayAuthors()
    {
        $this->assertTrue(function_exists('display_authors'));
    }

    public function test_assertFalse_displayAuthors()
    {
        $this->assertFalse(display_authors());
    }

    public function test_exists_displaySidebar()
    {
        $this->assertTrue(function_exists('display_sidebar'));
    }

    public function test_assertFalse_displaySidebar()
    {
        $this->assertFalse(display_sidebar());
    }

    public function test_exists_displayDateOfPublication()
    {
        $this->assertTrue(function_exists('display_date_of_publication'));
    }

    public function test_assertFalse_displayDateOfPublication()
    {
        $this->assertFalse(display_date_of_publication());
    }

    public function test_exists_displayKeywordsTaxonomy(){
        $this->assertTrue(function_exists('display_keywords_taxonomy'));
    }

    public function test_assertFalse_displayKeywordsTaxonomy()
    {
        $this->assertFalse(display_keywords_taxonomy());
    }

    public function test_exists_displayPublishedBy()
    {
        $this->assertTrue(function_exists('display_published_by'));
    }

    public function test_assertFalse_displayPublishedBy()
    {
        $this->assertFalse(display_published_by());
    }

    public function test_exists_displayFileUrlFileSize()
    {
        $this->assertTrue(function_exists('display_file_url_file_size'));
    }

    public function test_assertFalse_displayFileUrlFileSize()
    {
        $this->assertFalse(display_file_url_file_size());
    }

	public function test_exists_sidebar_title()
	{
		$this->assertTrue(function_exists('sidebar_title'));
	}
	public function test_exists_sidebar_content()
	{
		$this->assertTrue(function_exists('sidebar_content'));
	}
}