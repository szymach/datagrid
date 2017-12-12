<?php

/**
 * (c) FSi sp. z o.o. <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FSi\Component\DataGrid\Tests;

use FSi\Component\DataGrid\DataGridFactory;
use FSi\Component\DataGrid\Tests\Fixtures\FooExtension;
use FSi\Component\DataGrid\DataMapper\DataMapperInterface;
use FSi\Component\DataGrid\Exception\UnexpectedTypeException;
use FSi\Component\DataGrid\Exception\DataGridColumnException;

class DataGridFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    protected function setUp()
    {
        $extensions = [
            new FooExtension(),
        ];

        $dataMapper = $this->createMock(DataMapperInterface::class);

        $this->factory = new DataGridFactory($extensions, $dataMapper);
    }

    public function testCreateGrids()
    {
        $grid = $this->factory->createDataGrid();
        $this->assertSame('grid',$grid->getName());

        $this->setExpectedException(DataGridColumnException::class);
        $grid = $this->factory->createDataGrid('grid');
    }

    public function testHasColumnType()
    {
        $this->assertTrue($this->factory->hasColumnType('foo'));
        $this->assertFalse($this->factory->hasColumnType('bar'));
    }

    public function testGetColumntype()
    {
        $this->assertInstanceOf(Fixtures\ColumnType\FooType::class, $this->factory->getColumnType('foo'));

        $this->setExpectedException(UnexpectedTypeException::class);
        $this->factory->getColumnType('bar');
    }

    public function testGetDataMapper()
    {
        $this->assertInstanceOf(DataMapperInterface::class, $this->factory->getDataMapper());
    }
}
