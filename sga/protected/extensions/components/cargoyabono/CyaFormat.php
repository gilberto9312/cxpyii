<?php
/** agrega funciones especializadas para la clase CFormatter
 *
 * @author christian salazar
 */
 class CyaFormat extends CFormatter {

	public $simboloMoneda = " ";
 
	public function formatMoney($number,$localeid="en"){
		$n = new CNumberFormatter($localeid);
		return $n->formatCurrency($number,$this->simboloMoneda." ");
	}
 };