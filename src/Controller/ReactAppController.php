<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

/**
 * ReactApp Controller
 *
 *
 * @method \App\Model\Entity\ReactApp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReactAppController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function ReactApp()
    {
        
        $this->viewBuilder()->disableAutoLayout();
        $filePath = WWW_ROOT . '/asset-manifest.json';
        $file = new File($filePath);

        $manifest = json_decode($file->read());
        $file->close();
        $css = [];
        $js = [];
        foreach($manifest->entrypoints as $resource) {
               if (  preg_match('/\.css$/', $resource) === 1 ) {
                    $css[] = '/' . $resource;
               }
               if (  preg_match('/\.js$/', $resource) === 1 ) {
                $js[] = '/' . $resource;
           }
        }


        $this->set(compact('css', 'js'));
    }

}
