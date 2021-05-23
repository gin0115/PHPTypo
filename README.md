# THIS IS A PROOF OF CONCEPT

To run this, run

`$ composer install`

then to check against the single class, just run

`php index.php`

## Command Line Args

At the moment, the only 2 args which can be used are 

`--dict=en_gb`

or 

`--min-word=2`

Passing these as `php index.php --min-word=2 --dict=en_gb` will use the British "Dictionary" and only check words used in the classname wich are 2 letters or more in length.

The check is in file:`src/SpellCheck.php` which it self will only check the single class found `test/files/ClassNameTypo.php`

## Todo

Need to be able to pass in a dir or file using the `--src=??` option. This should then create the AST for each file, break all symbols on captial letter or underscores and check each word against the dictionary.

If any words are not found in the dictionary, it should push these errors to a report.

I need a way to either have a custom list of excluded words, and/or have a annotation (file, class, method) in the docblock such as `@phptypo : Ignore`

The PHP-Parser lib can handle all of this, we just need to pass the actual file contents to the parser and it can handle generating the AST of the file.

Obviously this needs a LOT of work!