<?php
namespace Shrink\Lib\ShrinkCompiler;

/**
* Interface for each Shrink Compiler abstraction
*/
interface ShrinkCompilerInterface{

    public function isAvailable();

    public function compile($file);

}
