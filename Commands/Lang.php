<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Lang extends BaseCommand
{
    protected $group       = 'Languages';
    protected $name        = 'lang:create';
    protected $description = 'Creates/Append Languages';

    public function run(array $params)
    {

        helper("filesystem");
        $path = APPPATH . "Helpers/langList.json";
        $lang = [];

        if (CLI::getOption('append')){
            if (file_exists($path)) {
                $lang = json_decode (file_get_contents($path), true);
            }else{
                CLI::write("You must set language list first", "red");
            }
        };


        do {
            $data = [
                'code'      => strtolower(CLI::prompt('What is language code?')),
                'name'      => CLI::prompt('What is language name?'),
                'default'   => (int)CLI::prompt('Is it default?'),
            ];

            
            foreach ($lang as $key => $value) {
                if (strtolower($data["name"]) == strtolower($value['name'])) die($name . ' - already in list');
                if (strtolower($data["code"]) == strtolower($value['code'])) die($code . ' - already in list');
            }
    
            if ($data['default'] == 1) {
                foreach ($lang as $key => $value) $lang[$key]['default'] = 0;
            }
            $lang[] = $data;
            
            $continue_ = 1;

            if(CLI::prompt("Want to add more?", ['y', 'n']) == "n"){
                $continue_ = 0;
            }
        } while ($continue_);

 

        if ( ! write_file( $path, $this->toJSON($lang) ) ) {
            CLI::write('Unable to write the file', "red");
        } else {
            CLI::write('File written!', "green");
        }
    }


    private static function toJSON($fileArray)
    {
        $json = json_encode($fileArray, JSON_PRETTY_PRINT | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
        return $json;
    }
}
