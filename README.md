# tna-research-redesign child theme template

### 1.0 Create a new project for the WordPress installation in PhpStorm

* Select 'Create New Project from Existing Files'
* Select 'Web server is installed locally, source files are located under its document root'
* Set /Applications/MAMP/htdocs/sites/tna-base-dev/wp-content/themes/tna-child-... and click 'Project Root'
* Specify parameters for a new server as:
  * Name: tna-child-...
  * Web server root URL: http://tna-base:8888
  * Set Project URL as: http://tna-base:8888

### 1.1 Installing dependencies

This repository is configured to allow for easy integration with Travis CI (Continuous Integration).

#### 1.1.1 Obtaining dependencies via Composer

Having followed the steps above you will be able to install dependencies by typing ```composer install``` at the Terminal.

#### 1.1.2 Obtaining dependencies via NPM

Type ```npm install``` to obtain Node dependencies

### 1.2 Running PHPUnit

Having followed the steps under 'Obtaining dependencies via Composer' type ```vendor/bin/phpunit -c phpunit.xml``` from within the tna-base directory to run Unit Tests for the project.

Note: PhpStorm allows for PHPUnit integration - allowing your tests to be run automatically. Search the JetBrains website to find out how to configure this.

### 1.3 Running Jasmine tests

Having obtained the dependencies you can type ```grunt jasmine``` to run JavaScript tests