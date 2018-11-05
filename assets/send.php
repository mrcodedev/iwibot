<?php 
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']) && isset($_POST['company']) && isset($_POST['tel']) && isset($_POST['privacidad']))
{
     $name = htmlspecialchars($_POST['name']); 
     $email = htmlspecialchars(str_replace(" ","",$_POST['email'])); 
     $mensaje = htmlspecialchars($_POST['message']); 
     $company = htmlspecialchars($_POST['company']); 
     $tel = htmlspecialchars($_POST['tel']);
     $privacidad = htmlspecialchars($_POST['privacidad']);

     function comprobar_email($email)
     { 
          //compruebo unas cosas primeras 
          if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){ 
               if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) { 
                    //miro si tiene caracter . 
                    if (substr_count($email,".")>= 1){ 
                         //obtengo la terminacion del dominio 
                         $term_dom = substr(strrchr ($email, '.'),1); 
                         //compruebo que la terminación del dominio sea correcta 
                         if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){ 
                              //compruebo que lo de antes del dominio sea correcto 
                              $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1); 
                              $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1); 
                              if ($caracter_ult != "@" && $caracter_ult != "."){ 
                              return true; 
                              } 
                              else 
                              { 
                              return false; 
                              } 
                         } 
                    } 
               } 
          } 
     } 


     if (empty($name) || empty($email) || empty($mensaje) || empty($company) || empty($tel) || empty($privacidad)) 
     { 
          echo "emptyone"; 
     }  
     else 
     { 
          if (comprobar_email($email)) 
          { 
               
               $remitente = "mrcodedev@gmail.com"; /* Correo a donde se enviara el mensaje */ 
               $destinatario = "info@iwibot.com"; /* Correo que envia el mensaje, es util para que no envie siempre el mensaje a correo no deseado */ 

               $headers = "MIME-Version: 1.0 \r\n"; 
               $headers .= "From: $destinatario \r\n"; 
               $headers .= "Reply-To: $remitente \r\n"; 
               $headers .= "Return-path: $remitente \r\n"; 
               $headers .= "Content-type: text/html; charset=iso-8859-1 \r\n";  

               $body = " 
               Te han enviado un formulario en la web de IWI BOT:
               <br><br>
               <table><tr><td width=\"150\" valign=\"top\"><strong>Nombre y apellidos:</strong></td><td> ".$name."</td></tr>"." 
               <tr><td valign=\"top\"><strong>Email:</strong></td><td> ".$email."</td></tr>"." 
               <tr><td valign=\"top\"><strong>Teléfono:</strong></td><td> ".$tel."</td></tr>"."
               <tr><td valign=\"top\"><strong>Empresa:</strong></td><td> ".$company."</td></tr>"." 

               <tr><td valign=\"top\"><strong>Mensaje:</strong></td><td>".$mensaje."</td></tr></table>"; 
               
               mail($remitente,"Consulta de IwiBot",$body, $headers); 
               echo "success";   
          }
          else 
          { 
               echo "Error en el servidor, ponte en contacto con nosotros a través de helloiwibot@gmail.com"; 
          } 
     } 
}else{
     echo "campovacio";
}

?>