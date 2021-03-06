<?php

/**
 * (c) FSi sp. z o.o. <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FSi\Component\DataGrid\Tests\Extension\Doctrine\ColumnType;

use FSi\Component\DataGrid\Tests\Fixtures\Entity as Fixture;
use FSi\Component\DataGrid\Extension\Doctrine\ColumnType\Entity;
use FSi\Component\DataGrid\Extension\Core\ColumnTypeExtension\DefaultColumnOptionsExtension;
use FSi\Component\DataGrid\DataMapper\DataMapperInterface;
use FSi\Component\DataGrid\DataGridInterface;
use PHPUnit\Framework\TestCase;

class EntityTypeTest extends TestCase
{
    public function testGetValue()
    {
        $column = new Entity();
        $column->setName('foo');
        $column->initOptions();

        $extension = new DefaultColumnOptionsExtension();
        $extension->initOptions($column);

        // Call resolve at OptionsResolver.
        $column->setOptions([]);

        $object = new Fixture('object');

        $dataGrid = $this->createMock(DataGridInterface::class);
        $dataMapper = $this->createMock(DataMapperInterface::class);

        $dataMapper->expects($this->once())
                   ->method('getData')
                   ->will($this->returnValue(['foo' => 'bar']));

        $dataGrid->expects($this->any())
                 ->method('getDataMapper')
                 ->will($this->returnValue($dataMapper));

        $column->setDataGrid($dataGrid);

        $column->getValue($object);
    }
}
