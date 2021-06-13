<?php
namespace GDO\Math\Test;

use GDO\Tests\TestCase;
use GDO\Math\Module_Math;
use function PHPUnit\Framework\assertStringStartsWith;

final class MathTest extends TestCase
{
    public function testMath()
    {
        # Get user evaluator
        $eval = Module_Math::instance()->getEvaluator();
        
        # Assign PI to a
        $eval->e('a = PI');
        $pi = $eval->e('a');
        assertStringStartsWith('3.14', $pi);

        # And test again
        $eval = Module_Math::instance()->getEvaluator();
        $pi = $eval->e('a');
        assertStringStartsWith('3.14', $pi);
    }
    
}
