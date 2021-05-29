<?php

/**
 * Test File
 *
 * A class with valid symbols
 *
 * @author Glynn Quelch <glynn.quelch@gmail.com>
 */

namespace Gin0115\PHPTypo\Tests\Files;

/**
 * This is a class which has all valid values.
 */
class ValidClass
{
    /** This a valid public constant. */
    public const PUBLIC_CONSTANT = null;
    
    /** This a valid protected constant. */
    protected const PROTECTED_CONSTANT = null;
    
    /** This a valid private constant. */
    private const PRIVATE_CONSTANT = null;
    
    /** This a valid public property. */
    public $validPublicProperty;
    
    /** This is a valid protected property. */
    protected $validProtectedProperty;
    
    /** This is a valid private property */
    private $validPrivateProperty;

    /** This is a valid public method */
    public function validPublicMethod()
    {
        // This is a valid public variable name
        $publicVariable = true;
    }

    /** This is a valid protected method */
    protected function validProtectedMethod()
    {
        // This is a valid protected variable name
        $protectedVariable = true;
    }

    /** This is a valid private method */
    private function validPrivateMethod()
    {
        // This is a valid private variable name
        $privateVariable = true;
    }
}
