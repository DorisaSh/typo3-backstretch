<?php
namespace W3Development\T3tBackstretch\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Elvis Tavasja <tavasja@gmail.com>, www.typo3tutorials.net
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class W3Development\T3tBackstretch\Controller\ImageController.
 *
 * @author Elvis Tavasja <tavasja@gmail.com>
 */
class ImageControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \W3Development\T3tBackstretch\Controller\ImageController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('W3Development\\T3tBackstretch\\Controller\\ImageController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllImagesFromRepositoryAndAssignsThemToView() {

		$allImages = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$imageRepository = $this->getMock('W3Development\\T3tBackstretch\\Domain\\Repository\\ImageRepository', array('findAll'), array(), '', FALSE);
		$imageRepository->expects($this->once())->method('findAll')->will($this->returnValue($allImages));
		$this->inject($this->subject, 'imageRepository', $imageRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('images', $allImages);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
