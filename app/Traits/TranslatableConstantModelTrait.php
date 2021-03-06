<?php  
namespace App\Traits;

trait TranslatableConstantModelTrait
{
	public static function loadData()
	{
		if (empty(self::$data))
		{
			$oClass = new \ReflectionClass(__CLASS__);

			$constants = $oClass->getConstants();

			foreach ($constants as $name=>$value)
			{
				self::$data[$value]['name'] = trans('constants.'.($oClass->getShortName()).'-'.$name);
			}
		}

		return self::$data;
	}
}
?>