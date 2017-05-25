<?php
class FunctionsTest extends PHPUnit_Framework_TestCase
{
    public function test_exists_tna_child_styles()
    {
        $this->assertTrue(function_exists('tna_child_styles'));
    }
    public function test_exists_dequeue_parent_style()
    {
        $this->assertTrue(function_exists('dequeue_parent_style'));
    }

    public function test_exists_custom_taxonomy()
    {
        $this->assertTrue(function_exists('custom_taxonomy'));
    }

    public function test_exists_research_meta_boxes()
    {
        $this->assertTrue(function_exists('research_meta_boxes'));
    }

    public function test_exists_setThemeGlobals()
    {
        $this->assertTrue(function_exists('setThemeGlobals'));
    }

    public function test_exists_identifyEnvironmentFromIP()
    {
        $this->assertTrue(function_exists('identifyEnvironmentFromIP'));
    }
}