<?php
    class UploadController extends Controller
    {
        public static function uploadPage()
        {
            if(!empty($_SESSION["id"])){
                self::upload();
                return self::setview("upload", true);
            }else{
                header("location: index.php?page=login&redirect=upload");
            }
        }

        public static function upload(){
            global $err;
            global $errMsg;
            global $suc;
            global $sucMsg;

            if(isset($_POST["upload"])){
                $file = $_FILES["miniature"];
                $title = htmlspecialchars($_POST["titre"]);
                $content = htmlspecialchars($_POST["content"]);

                $img = self::uploadFile($file);

                if($img) {
                    if(strlen($title) > 0 && strlen($content) > 0){
                        
                        if(Article::setArticle($title, $img, $content, true, $_SESSION["id"]["id"])){
                            $suc = true;
                            $sucMsg = "Article creer avec success :)";
                        }else{
                            $err = true;
                            $errMsg = "Erreur lors de la mise en ligne de l'article";
                        }

                    }else{
                        $err = true;
                        $errMsg = "Veillez remplir tout les champs";
                    }
                }else{
                    $err = true;
                    $errMsg = "L'image est invalide";
                }
            }
        }

    public static function uploadFile($file)
    {
        $img_file = $file;
        $tmp_img =  $img_file["tmp_name"];
        $type = $img_file["type"];
        $img_name = time() . $img_file["name"];
        $img_error = $img_file["error"];
        $img_size = $img_file["size"];
        $img_size_mo = ($img_size / 1024) / 1024;
        $max_size_mo = 3;
        $destination = "files/post/" . $img_name;

        if ($img_size_mo < $max_size_mo) {
            if (move_uploaded_file($tmp_img, $destination)) {
                return $img_name;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
