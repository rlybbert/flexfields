<?php

namespace FlexFields\Traits;

/**
 * Trait Data
 *
 * @package FlexFields\Traits
 */
trait Data {

	/**
	 * Internal data storage.
	 *
	 * @var array
	 */
	protected $_data = [];

	/**
	 * Fetch value from data object.
	 *
	 * @param string|array $key Passing an array allows you to fetch nested data
	 * @param mixed $default
	 *
	 * @returns mixed
	 */
	public function getData( $key, $default = null ) {

		$value = $default;

		if ( is_string( $key ) ) {
			if ( isset( $this->_data[ $key ] ) ) {
				$value = $this->_data[ $key ];
			}
		}

		if ( is_array( $key ) ) {
			$value    = $this->_data;
			$segments = $key;
			foreach ( $segments as $segment ) {
				if ( isset( $value[ $segment ] ) ) {
					$value = $value[ $segment ];
				} else {
					$value = $default;
					break;
				}
			}
		}

		return $value;
	}

	/**
	 * Set data value
	 *
	 * @param string $key
	 * @param mixed $value
	 */
	public function setData( $key, $value ) {
		$this->_data[ $key ] = $value;
	}

}