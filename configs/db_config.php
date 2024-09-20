<?php   
   //Remote
   
     define("SERVER","localhost");
     define("USER","root");//rajib
     define("DATABASE","test");
     define("PASSWORD","");


    //  define("SERVER","localhost");
    //  define("USER","shohel");//rajib
    //  define("DATABASE","wdpf56_shohel");
    //  define("PASSWORD","shohel123;");


   //Local
   
    //define("SERVER","localhost");
    //define("USER","root");//rajib
    //define("DATABASE","hosting");
    //define("PASSWORD","");

    $db=new mysqli(SERVER,USER,PASSWORD,DATABASE);
    $tx="core_";
    

?>