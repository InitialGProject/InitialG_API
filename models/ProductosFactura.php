<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos_factura".
 *
 * @property int $id_facturacion
 * @property int $id_producto
 * @property int $cantidad
 * @property float  $conIVA 
 * @property float  $sinIVA 
 * @property ProductosFacturacion $facturacion
 * @property Productos $producto
 */
class ProductosFactura extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos_factura';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_facturacion', 'id_producto', 'cantidad', 'conIVA', 'sinIVA'], 'required'],
            [['id_facturacion', 'id_producto', 'cantidad'], 'integer'],
            [['conIVA', 'sinIVA', 'IVA', 'unidad'], 'number'],
            [['nombre'], 'string'],
            [['IVA'], 'default', 'value' => '12'],
            [['id_facturacion'], 'exist', 'skipOnError' => true, 'targetClass' => ProductosFacturacion::class, 'targetAttribute' => ['id_facturacion' => 'id']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::class, 'targetAttribute' => ['id_producto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_facturacion' => Yii::t('app', 'Id Facturacion'),
            'id_producto' => Yii::t('app', 'Id Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'conIVA' => Yii::t('app', 'Con Iva'), 
            'sinIVA' => Yii::t('app', 'Sin Iva'),
        ];
    }

    /**
     * Gets query for [[Facturacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacturacion()
    {
        return $this->hasOne(ProductosFacturacion::class, ['id' => 'id_facturacion']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::class, ['id' => 'id_producto']);
    }
}
