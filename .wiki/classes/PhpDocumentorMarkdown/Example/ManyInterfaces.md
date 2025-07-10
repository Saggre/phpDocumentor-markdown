# ManyInterfaces

A ManyInterfaces

ManyInterfaces description 

- **See:** \PhpDocumentorMarkdown\Example\AbstractProduct

***

* Full name: `\PhpDocumentorMarkdown\Example\ManyInterfaces`
* Parent interfaces:
  [`\PhpDocumentorMarkdown\Example\ProductInterface`](./ProductInterface.md),
  `JsonSerializable`

## Inherited methods

### toArray

Get the instance as an array.

```php
public toArray(): array
```

***

### __construct

```php
public __construct(string $name, float $price): mixed
```

**Parameters:**

| Parameter | Type       | Description    |
|-----------|------------|----------------|
| `$name`   | **string** | Product name.  |
| `$price`  | **float**  | Product price. |

***

### getName

Get the name of the product.

```php
public getName(): string
```

***

### getPrice

Get the price of the product.

```php
public getPrice(): float
```

***

### getTaxRate

Get the tax rate for this product.

```php
public getTaxRate(): float
```

***
