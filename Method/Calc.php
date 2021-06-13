<?php
namespace GDO\Math\Method;

use GDO\DB\GDT_String;
use GDO\Form\GDT_Form;
use GDO\Form\MethodForm;
use GDO\Form\GDT_Submit;
use GDO\Form\GDT_AntiCSRF;
use GDO\Math\Module_Math;

/**
 * Evaluate a math formula.
 * @author gizmore
 * @version 6.10.4
 */
final class Calc extends MethodForm
{
    public function createForm(GDT_Form $form)
    {
        $form->addFields([
            GDT_String::make('input')->notNull(),
            GDT_AntiCSRF::make(),
        ]);
        $form->addField(GDT_Submit::make());
    }

    public function formValidated(GDT_Form $form)
    {
        $module = Module_Math::instance();
        $math = $module->getEvaluator();
        $input = $form->getFormVar('input');
        $result = $math->e($input);
        return $this->message('%s', [$result]);
    }
    
}
