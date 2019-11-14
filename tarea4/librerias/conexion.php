<?php

class conexion{

    public $cox;
    static $instancia = null;

    static function consulta($sql){

        if(self::$instancia==null){
            self::$instancia=new conexion();
        }
        //echo mysqli_error(self::$instancia->cox, $sql);
        $rs=mysqli_query(self::$instancia->cox, $sql);
       
        if(IS_DEBUG){
            echo mysqli_error(self::$instancia->cox);
        }
        
        
        return $rs;
    }

    
    function getInstancia()
{
    return $this->cox;
}

    function __construct()
    {
        $this->cox=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME)
        or die("<script>
            window.location='install.php'
        </script>");
    }

    function __destruct()
    {
        mysqli_close($this->cox);
    }
}