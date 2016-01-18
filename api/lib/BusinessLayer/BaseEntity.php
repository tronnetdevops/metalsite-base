<?php
	/**
	 * @brief Base Manager for managing Objects.
	 *
	 * ## Overview
	 *
	 * @author Sean Murray <smurray@tronnet.me>
	 * @date 06/25/2015
	 */
		
	namespace SatanBarbaraAPI;

	abstract class BaseEntity {
		
		/**
		 * Entity Attribute Permission Levels
		 */
		const EAP_PRIVATE = 1;
		const EAP_READ_ONLY = 2;
		const EAP_WRITE = 3;
		const EAP_UPDATE = 4;
		
		const EAP_APPLICATION_READ_ONLY = 2;
		const EAP_APPLICATION_WRITE = 3;
		const EAP_APPLICATION_UPDATE = 4;
		
		const EAP_ADMIN_READ_ONLY = 5;
		const EAP_ADMIN_WRITE = 6;
		const EAP_ADMIN_UPDATE = 7;
		
		const EAP_CLIENT_READ_ONLY = 8;
		const EAP_CLIENT_WRITE = 9;
		const EAP_CLIENT_UPDATE = 10;
		
		const EAP_USER_READ_ONLY = 11;
		const EAP_USER_WRITE = 12;
		const EAP_USER_UPDATE = 13;
		
		static protected $standard_attr_properties = array(
			'value' => null,
			'set' => false,
			'initial' => null,
			'default' => null,
			'placeholder' => ''
		);
		
		protected $attrs = array();
		
	    /**
	     * Class Methods
	     */
         
	    /**#@+
		 * @static
	     * @access public
	     */
		
		static public function GetProperties(){
			return static::$properties;
		}
    
	    /**
	     * @brief Creates a new Object.
	     *
	     * ## Overview
	     * This will parse various request parameters and attemp to call the 
		 * respective action on an object controller.
	     *
	     * @uses AccountManager
	     * @uses AJAX
	     *
	     * @return {Null} Always unless fatal error or exception is thrown.
	     *
	     * @author TronNet DevOps [Sean Murray] <smurray@tronnet.me>
	     * @date 02/19/2014
	     */
		public function __construct($attrs) {
			/**
			 * Formating the properties so we can do rollbacks and maintain a history.
			 */
			$properties = self::GetProperties();
			
			foreach($properties as $key => $value){
				/**
				 * PHP should automatically create a copied instance of standard attr obj
				 * by default. This will prevent setting a value for one field and having
				 * it cascade to the others. But keep an eye out for this in older versions
				 * of php.
				 */
				$this->attrs[ $key ] = array_replace(self::$standard_attr_properties, $value);
			}

			$this->SetValues($attrs);
		}
		
		public function SetValue($field, $value){
			if (isset($this->attrs[ $field ])){
				if (!$this->attrs[ $field ]['set']){
					$this->attrs[ $field ]['initial'] = $this->attrs[ $field ]['value'];
					$this->attrs[ $field ]['set'] = true;
				}
				
				$this->attrs[ $field ]['value'] = $value;
			}
		}
		
		public function SetValues($values){
			foreach($values as $field => $value){
				$this->SetValue($field, $value);
			}
		}

		public function GetValue($fieldName, $default = false){			
			if ($default && !$this->attrs[ $fieldName ]['set'] && $this->attrs[ $fieldName ]['default'] !== null){
				return $this->attrs[ $fieldName ]['default'];
			} else {
				if (isset(static::$properties[ $fieldName ]['process'])){
					if (isset(static::$properties[ $fieldName ]['process']['enum'])){
						return static::$properties[ $fieldName ]['process']['enum'][ $this->attrs[ $fieldName ]['value'] ];
					} else {
						return $this->attrs[ $fieldName ]['value'];
					}
				} else {
					return $this->attrs[ $fieldName ]['value'];
				}
			}
		}
				
		public function GetValues($fieldNames = null, $onlySetFeilds = false, $defaults = false){
			$values = array();
			
			if (is_array($fieldNames) && !empty($fieldNames)){
				$attrs = $fieldNames;
			} else {
				$attrs = $this->attrs;
			}
			
			/**
			 * More code but less operations!
			 */
			if ($onlySetFeilds){
				foreach($attrs as $attrName => $attr){
					if ($this->attrs[ $attrName ]['set'] || $defaults){
						$value = $this->GetValue( $attrName, $defaults );
						if ($value !== null){
							$values[ $attrName ] = $value;
						}
					}
				}
			} else {
				foreach($attrs as $attrName => $attr){
					$values[ $attrName ] = $this->GetValue( $attrName, $defaults );
				}
			}
			
			return $values;
		}
		
		public function Save(){
			$manager = SATANBARBARA_API_NAMESPACE . static::$_ENTITY . 'Manager';
			
			return $manager::Save( $this );
		}
		
		public function Delete(){
			$manager = SATANBARBARA_API_NAMESPACE . static::$_ENTITY . 'Manager';
			
			return $manager::Delete( $this->GetValue('id') );
		}
	    /**#@-*/
	}