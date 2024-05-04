<?php
// Set the namespace for a file
namespace My\Namespace;

// By default, classes exist in the global namespace, and can
// be explicitly called with a backslash.

// $cls = new \MyClass();


class MyClass
{
}

//Or from within another namespace.
namespace My\Other\Namespace;

use My\Namespace\MyClass;

$cls = new MyClass();

// Or you can alias the namespace;

namespace My\Other\Namespace;

use My\Namespace as SomeOtherNamespace;

$cls = new SomeOtherNamespace\MyClass();
