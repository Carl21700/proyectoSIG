<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Symfony\Component\CssSelector\Parser\Reader;
use League\Csv\Reader;

use App\Models\Edificio; 
class EdificioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
// Esta línea es necesaria para que en una Mac se detecten 
// correctamente los caracteres de nueva línea
if (!ini_get("auto_detect_line_endings")) {
    ini_set("auto_detect_line_endings", '1');     
 }     
 
 $csv = Reader::createFromPath('database/seeders/sig.csv', 'r');    
  
 // indicamos que el delimitador es el p    unto y coma
 $csv->setDelimiter(';');     
 // Indicamos el índice de la fila de nombres de columnas
 $csv->setHeaderOffset(0);     
 $records = $csv->getRecords();      
 
 foreach ($records as $r) {
  
    
    $edificio = new Edificio();
    $edificio->descripcion = $r['descripcion'];
    $edificio->codEdif = $r['codEdif'];         
    $edificio->latitud = $r['latitud'];
    $edificio->longitud = $r['longitud'];         
    $edificio->grupo = $r['grupo'];
    $edificio->sigla = $r['sigla'];
    $edificio->save();
  }
}
}
