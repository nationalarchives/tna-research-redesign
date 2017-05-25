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
        $this->assertTrue(function_exists('displayAuthors'));
    }

    public function test_assertFalse_displayAuthors()
    {
        $this->assertFalse(displayAuthors());
    }

    public function test_exists_displaySidebar()
    {
        $this->assertTrue(function_exists('displaySidebar'));
    }

    public function test_assertFalse_displaySidebar()
    {
        $this->assertFalse(displaySidebar());
    }

    public function test_exists_displayDateOfPublication()
    {
        $this->assertTrue(function_exists('displayDateOfPublication'));
    }

    public function test_assertFalse_displayDateOfPublication()
    {
        $this->assertFalse(displayDateOfPublication());
    }

    public function test_exists_displayKeywordsTaxonomy(){
        $this->assertTrue(function_exists('displayKeywordsTaxonomy'));
    }

    public function test_assertFalse_displayKeywordsTaxonomy()
    {
        $this->assertFalse(displayKeywordsTaxonomy());
    }

    public function test_exists_displayPublishedBy()
    {
        $this->assertTrue(function_exists('displayPublishedBy'));
    }

    public function test_assertFalse_displayPublishedBy()
    {
        $this->assertFalse(displayPublishedBy());
    }

    public function test_exists_displayFileUrlFileSize()
    {
        $this->assertTrue(function_exists('displayFileUrlFileSize'));
    }

    public function test_assertFalse_displayFileUrlFileSize()
    {
        $this->assertFalse(displayFileUrlFileSize());
    }
}
