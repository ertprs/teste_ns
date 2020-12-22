<?php
 
    function upload($tmp, $nome, $largura, $pasta, $type){

        $type = explode("/", $type);

        switch ($type[1]) {
            
            case 'jpeg':
                $img = imagecreatefromjpeg($tmp);
                $x = imagesx($img);
                $y = imagesy($img);
                $altura = ($largura * $y) / $x;
         
                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, "$pasta/$nome");
                imagedestroy($nova);
                imagedestroy($img);
         
                return($nome);
            break;
            
            case 'png':
                $img = imagecreatefrompng($tmp);
                $x = imagesx($img);
                $y = imagesy($img);
                $altura = ($largura * $y) / $x;
         
                $nova = imagecreatetruecolor($largura, $altura);
                imagealphablending($nova, true); //permite alpha blending na imagem de destino.
                $transparent = imagecolorallocatealpha( $nova, 0, 0, 0, 127 ); // Atribui uma cor transparente e preenche a nova imagem com ele.
                imagefill($nova, 0, 0, $transparent ); // Sem isso, a imagem terá um fundo preto em vez de ser transparente.
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagealphablending($nova, false);
                imagesavealpha($nova,true); // salva o alfa
                imagepng($nova, "$pasta/$nome");
                imagedestroy($nova);
                imagedestroy($img);
         
                return($nome);
            break;
        }
    }
 
?>