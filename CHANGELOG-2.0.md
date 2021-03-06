# Changelog 1.x to 2.0

This is a list changes done in the 2.0 vesion.

## Deleted Symfony extension

Since it was moved to [datagrid-bundle](https://github.com/fsi-open/datagrid-bundle),
it has been removed from this component.

## Changed null value semantic in boolean column

Boolean column now treats `null`s like non existing value instead of `false` value. It displays empty string when
all input values are `null`s.

## Dropped support for PHP below 7.1

To be able to fully utilize new functionality introduced in 7.1, we have decided
to only support PHP versions equal or higher to it.

## Removed deprecated methods

The following deprecated interfaces, classes and methods were removed because they were replaced by
[data-indexer](https://github.com/fsi-open/data-indexer/) component.

- `FSi\Component\DataGrid\Data\IndexingStrategyInterface`
- `FSi\Component\DataGrid\Data\EntityIndexingStrategy`
- `FSi\Component\DataGrid\DataGridFactoryInterface::getIndexingStrategy`
- `FSi\Component\DataGrid\DataGridInterface::getIndexingStrategy`

## Added argument and return typehints

All interfaces and classes are now strictly typed.

## Removed fluent interfaces

All interfaces except `DataGridInterface` are no longer fluent.
