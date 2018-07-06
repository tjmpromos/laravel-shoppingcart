<?php

namespace Tjmpromos\Laravel\Shoppingcart;


class CartBase
{
    /**
     * @param $value
     * @param $decimals
     * @param $decimalPoint
     * @param $thousandSeparator
     * @param null $currency
     * @param bool $showCurrency
     * @return string
     */
    function numberFormat(
        $value,
        $decimals,
        $decimalPoint,
        $thousandSeparator,
        $currency = null,
        $showCurrency = true
    ) {
        if (is_null($decimals)) {
            $decimals = is_null(config('cart.format.decimals')) ? 2 : config('cart.format.decimals');
        }
        if (is_null($decimalPoint)) {
            $decimalPoint = is_null(config('cart.format.decimal_point')) ? '.' : config('cart.format.decimal_point');
        }
        if (is_null($thousandSeparator)) {
            $thousandSeparator = is_null(config('cart.format.thousand_separator')) ? ',' : config('cart.format.thousand_separator');
        }
        if (is_null($currency)) {
            $currency = is_null(config('cart.format.currency')) ? '' : config('cart.format.currency');
        }
        if (!$showCurrency) {
            $currency = null;
        }
        return $currency . number_format($value, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}