<?php

interface auto {
    static public function wywolaj_autoload();
}

abstract class Autoload implements auto {

    /**
     * Stałym przypisujemy folder
     * ze zbiorem interfejsów "LIBINTERFACE", i trait
     * też osobny "LIBTRAIT"
	 * nazwy folderów
     */
	 
    const LIBINTERFACE = "lib-interface";
    const LIBTRAIT     = "lib-traid";

    static private $filename;
    static private $filename1;
    static private $filename2;

    public function __construct() {
        
    }

    static private function autoload($className) {
        try {
            if (!empty($className)) {
                ## czyścimy ze śmieci ## 
                preg_match('/^[a-zA-ZąęćłńóśźżĄĆĘŁŃÓŚŹŻ0-9\_\-\:\.\,\ \/]+$/', $className, $class_base);
                
              /**
               * Liczymy ilość znaków w nazwie pliku
               */
                if (strlen($class_base[0]) > 40) {
                    throw new Exception("Blad: Plik jest niewlasciwy: " . $class_base[0] . '<br>');
                }

                /**
                 * Dodajemy folder rodzica pozostałych folderów
                 * 
                 */
                
             ### Zdefinować gdzie znajdują się foldery dla Autoload ###
                $katalog = new DirectoryIterator(dirname(__DIR__));
                foreach ($katalog as $dir) {
                    if ($dir->isDot() === false) {
                        if ($dir->isDir() === true) {
                            $dir = trim($dir);
                            $kat[] = $dir;
                    /**
                    * Jeżeli inkludowanie nie działa 
                    * dopisać odpowiednią ścieżkę
                     */
                $plikii[$dir] = glob($dir . '/*.php');
                        }
                    }
                }
				
     for ($i = 0; $i < count($plikii); $i++) {
      foreach ($plikii[$kat[$i]] as $file) {
          list($plik, $rozsze) = preg_split('/[\.]+/', basename($file));
        if(strcmp($class_base[0], $plik) === 0) {
         $file = dirname(__DIR__) . '/' . $kat[$i] . '/' . $plik . '.php';
          if (file_exists($file)) {
            require_once( $file );            

    if (in_array(self::LIBINTERFACE, array($kat[$i]))) {
      if (!interface_exists($plik)) {
         throw new Exception("Błąd Interfejs Nie Istnieje: " . $plik . '<br>');
                 }
           }
    if (in_array(self::LIBTRAIT, array($kat[$i]))) {
      if (!trait_exists($plik)) {
        throw new Exception("Błąd Trait Nie Istnieje: " . $plik . '<br>');
            }
         }

    if (!in_array(self::LIBTRAIT, array($kat[$i])) &&
        !in_array(self::LIBINTERFACE, array($kat[$i]))) {
     if (!class_exists($plik, false)) {
        throw new Exception("Błąd Klasa Nie Istnieje: " . $plik . '<br>');
    }
       }
       // print_r(array_values(class_implements($plik)));
       //print_r(get_declared_interfaces());
        //print_r(class_uses($plik));     
      } else {
  throw new Exception("Błąd wczytywania pliku klasy: " . $class_base[0] . '.php<br>');
           }
       }
   }
  }
     } else {
      throw new Exception("Klasa nie wczytana:<br>");
  }
        } catch (Exception $e) {
            self::unregister_autoload();
            echo ($e->getMessage());
            ## metoda do obsługi błędów i zapisie logów ## 
               SeparationDatabaseQueries::obsugaBledow($e);
        }
    }

    static public function unregister_autoload() {
        foreach (spl_autoload_functions() as $class) {
            spl_autoload_unregister($class);
        }
    }

    static public function wywolaj_autoload() {
        spl_autoload_register(array('Autoload', 'autoload'));
    }
}

Autoload::wywolaj_autoload();

