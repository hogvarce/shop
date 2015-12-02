<?php
namespace app\models;

use Yii;
use yii\base\Model;

class GadgetsFilterForm extends Model
{
    public $brand;
    public $priceFrom;
    public $priceTo;
    public $storageFrom;
    public $storageTo;
    public $color;
    public $touchscreen = false;
    public $inpack;
    public $valueFrom;
    public $valueTo;

    public function rules()
    {
        return [
            [['priceFrom', 'priceTo', 'storageFrom', 'storageTo', 'inpack', 'valueFrom', 'valueTo'], 'number', 'min' => 0],
            ['touchscreen', 'boolean'],
            [['brand', 'color'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'brand' => 'Марка',
            'priceFrom' => 'Цена от',
            'priceTo' => 'Цена до',
            'storageFrom' => 'Количество в упаковке от',
            'storageTo' => 'Количество в упаковке до',
            'touchscreen' => 'Touchscreen',
            'color' => 'Цвет',
            'inpack' => 'Количество в упаковке',
            'valueFrom' => 'Объем от',
            'valueTo' => 'Объем до',
        ];
    }

    public function parse()
    {
        $filters = [];

        if ($this->brand) {
            $filters['brand'] = $this->brand;
        }

        if ($this->priceFrom > 0 || $this->priceTo > 0) {
            $filters['price'] = [$this->priceFrom, $this->priceTo];
        }

        if ($this->storageFrom > 0 || $this->storageTo > 0) {
            $filters['inpack'] = [$this->storageFrom, $this->storageTo];
        }

        if ($this->touchscreen) {
            $filters['touchscreen'] = $this->touchscreen;
        }

        if ($this->color) {
            $filters['color'] = $this->color;
        }

        if ($this->valueFrom > 0 || $this->valueTo > 0) {
            $filters['obiem'] = [$this->valueFrom, $this->valueTo];
        }

        return $filters;
    }
}
