<?php
use Migrations\AbstractMigration;

class InsertItemTypesTableDefaultData extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        
        $data = [
            [
                'name'=> 'IMPRESORA',
                'description'=> 'Aparato de impresion',
                'scope'=> 'IMPRESORAS',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'CONSUMIBLE',
                'description'=> 'Consumible para impresoras',
                'scope'=> 'IMPRESORAS',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'TELEFONIA',
                'description'=> 'Aparatos telecomunicación',
                'scope'=> 'TELECOMUNICACIONES',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'LINEA TELEFONICA',
                'description'=> 'Aparatos telecomunicación',
                'scope'=> 'TELECOMUNICACIONES',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'RADIOS',
                'description'=> 'Aparatos telecomunicación',
                'scope'=> 'TELECOMUNICACIONES',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'TECLADO',
                'description'=> 'Elemento de entrada de datos',
                'scope'=> 'HARDWARE',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'RATON',
                'description'=> 'Elemento de puntero de pc',
                'scope'=> 'HARDWARE',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'CARGADOR',
                'description'=> 'Elemento de carga',
                'scope'=> 'HARDWARE',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'MONITOR',
                'description'=> 'elemento de visualizacion de informacion',
                'scope'=> 'HARDWARE',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
            [
                'name'=> 'SWITCH',
                'description'=> 'Elemento de enrutamiento',
                'scope'=> 'REDES',
                'created'=> date('Y-m-d H:i:s'),
                'modified'=> date('Y-m-d H:i:s')
            ],
             
        ];

        $this->table('item_types')->insert($data)->save();
    }
}
