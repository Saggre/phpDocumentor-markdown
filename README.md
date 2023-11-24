# phpDocumentor - Generate GitHub/GitLab-Ready Markdown Documentation

## Markdown template for phpDocumentor 3.x

![Tests Status](https://github.com/Saggre/phpDocumentor-markdown/workflows/Run%20tests/badge.svg?style=flat-square)
![Generate Docs Status](https://github.com/Saggre/phpDocumentor-markdown/workflows/Generate%20docs/badge.svg?style=flat-square)

Have you ever wished there was an easier way to generate documentation for your PHP source code? Well, now there is! With [phpDocumentor](https://www.phpdoc.org/) and phpDocumentor-markdown, you can automatically generate GitHub/GitLab-ready Markdown documentation from your PHP source code. This template can be used to document classes, interfaces, traits, constants, properties and methods.

## Example
An example is available in the [example](example/Home.md) directory.

## Installation & Usage
- Please refer to [this guide](https://docs.phpdoc.org/3.0/guide/getting-started/installing.html) for instructions on installing phpDocumentor.
- Usage instructions assume that `phpDocumentor` is the phpDocumentor 3.x binary.

### Running manually
```bash
# Run phpDocumentor with --template argument pointed to this directory's markdown template
phpDocumentor --directory=src --target=docs --template=<PATH TO THIS REPOSITORY/themes/markdown>
```

### Using Composer

#### Installation via Composer
```bash
# Require this package. You probably want it as a dev dependency
composer require --dev saggre/phpdocumentor-markdown
```

#### Running manually after installing via Composer
```bash
# Run phpDocumentor with --template argument pointed to markdown template inside vendor directory
phpDocumentor --directory=src --target=docs --template="vendor/saggre/phpdocumentor-markdown/themes/markdown"
```

#### Adding a Composer helper script
Add this script to your `composer.json` and run `composer create-docs` to generate the documentation.

```json
"scripts": {
    "create-docs": "phpDocumentor --directory=src --target=docs --template='vendor/saggre/phpdocumentor-markdown/themes/markdown'"
},
```

#### Using with PhpDocumentor XML config
Add a template element to your phpDocumentor XML config and run `phpDocumentor` to generate the documentation.
```xml
<phpdocumentor>
    <!-- Specify template element inside phpdocumentor -->
    <template name="./vendor/saggre/phpdocumentor-markdown/themes/markdown"/>
</phpdocumentor>
```
You can also check out the [config file](./phpdoc.dist.xml) used for generating this repository's example documentation for a full example.

## Running tests
```bash
# Clone the repository
git clone git@github.com:Saggre/phpDocumentor-markdown.git

# Go to the cloned repository
cd phpDocumentor-markdown

# Install dependencies
composer install

# Set up PHPUnit configuration
cp phpunit.xml.dist phpunit.xml

# Run PHPUnit in project root directory
composer test
```

## Contributing
- Use PSR-12 coding style
- Twig extensions do not yet work with phpDocumentor3 ([See #3041](https://github.com/phpDocumentor/phpDocumentor/pull/3041)), so custom functionality is created with [Twig macros](./themes/markdown/include/macros.twig).
- The test suite uses Twig extensions to test the Twig macro functionality.
- Check [`\phpDocumentor\Descriptor\ProjectDescriptor`](https://github.com/phpDocumentor/phpDocumentor/blob/master/src/phpDocumentor/Descriptor/ProjectDescriptor.php) for data structure used to generate the documentation.

## Inspired by:

* [dmarkic/phpdoc3-template-md](https://github.com/dmarkic/phpdoc3-template-md)
* [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)
* [evert/phpdoc-md](https://github.com/evert/phpdoc-md)
* [heimrichhannot/phpdoc-github-template](https://github.com/heimrichhannot/phpdoc-github-template)
