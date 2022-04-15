# Markdown template for phpDocumentor3

**Note:** Tested with phpDocumentor v3.3.1. Should work with all v3.x releases.

## Example
An example is available in the [example](example/index.md) directory.

## Installation & Usage
Usage instructions, assuming `phpdoc` is the phpDocumentor3 binary.

### Using Composer

#### Installation via Composer
```bash
# Require this package
composer require --dev saggre/phpdocumentor-markdown
```

#### Running manually after installing via Composer
```bash
# Run phpDocumentor with --template argument pointed to markdown template inside vendor directory
phpdoc --directory=src --target=docs --template="vendor/saggre/phpdocumentor-markdown/themes/markdown"
```

#### Adding a Composer helper script
Add this script to your `composer.json` and run `composer documentation` to generate the documentation.

```json
"scripts": {
    "documentation": "phpdoc --directory=src --target=docs --template='vendor/saggre/phpdocumentor-markdown/themes/markdown'"
},
```

#### Using with PhpDocumentor XML config
Add a template element to your phpDocumentor XML config and run `phpdoc` to generate the documentation.
```xml
<phpdocumentor>
    <!-- Specify template element inside phpdocumentor -->
    <template name="./vendor/saggre/phpdocumentor-markdown/themes/markdown"/>
</phpdocumentor>
```
You can also check out the [config file](./phpdoc.dist.xml) used for generating this repository's example documentation for a full example.

### Running manually
```bash
# Run phpDocumentor with --template argument pointed to this directory's markdown template
phpdoc --directory=src --target=docs --template=<PATH TO THIS REPOSITORY/themes/markdown>
```

## Running tests
```bash
# Clone the repository
git clone git@github.com:Saggre/phpDocumentor-markdown.git

# Install dependencies
composer install

# Set up PHPUnit configuration
cp phpunit.xml.dist phpunit.xml

# Run PHPUnit in project root directory
vendor/bin/phpunit
```

## Contributing
- Use PSR-12 coding style
- Twig extensions do not yet work with phpDocumentor3, so custom functionality is created with [Twig macros](./themes/markdown/include/macros.twig).
- The test suite uses Twig extensions to test the Twig macro functionality.

## Inspired by:

* [dmarkic/phpdoc3-template-md](https://github.com/dmarkic/phpdoc3-template-md)
* [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
* [evert/phpdoc-md](https://github.com/evert/phpdoc-md)
* [heimrichhannot/phpdoc-github-template](https://github.com/heimrichhannot/phpdoc-github-template)
