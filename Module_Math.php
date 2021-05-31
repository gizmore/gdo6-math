<?php
namespace GDO\Math;

use GDO\Core\GDO_Module;
use GDO\User\GDO_User;

final class Module_Math extends GDO_Module
{
    ##############
    ### Module ###
    ##############
    public function onLoadLanguage() { return $this->loadLanguage('lang/math'); }
    
    ##################
    ### 3p Library ###
    ##################
    public function includeEvalMath()
    {
        $path = $this->filePath('3p/EvalMath.php');
        require_once $path;
    }
    
    public function getEvaluator()
    {
        $user = GDO_User::current();
        if (!($math = $user->tempGet('math_evaluator')))
        {
            $math = new \EvalMath();
            $user->tempSet('math_evaluator', $math);
        }
        return $math;
    }
    
}
