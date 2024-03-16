<?php
                    $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
                    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

                        if (in_array($ext, $extensions_valides)) {

                            if (isset($_POST['name']) AND isset($_POST['description']) AND isset($_POST['priceA']) AND isset($_POST['priceJ']) AND
                                move_uploaded_file($_FILES['image']['tmp_name'], '../img/produits/'.basename($_FILES['image']['name'])){

                                $requete = $bdd->prepare('INSERT INTO products(name, description, priceA, priceJ, image) VALUES (?, ?, ?, ?, ?)');
                                $requete->execute(array($_POST['name'], $_POST['description'], $_POST['priceA'], $_POST['priceJ'], $_FILES['image']['name']));

                            }else{

                                $erreur = "Un problème de téléchargement est survenu !!";

                            }else{

                                $erreur = "Formats autorisés : jpg, png, gif";
                            }

                        }
                     ?>