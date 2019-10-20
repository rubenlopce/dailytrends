<?php

    class feedController{

        public function createFeed(){

        }

        public function showFeed(){

        }

        public function updateFeed($title,$image,$publisher,$body,$source,$position,$feedArray){

            $feedArray[$position]->setTitle($title);
            $feedArray[$position]->setImage($image);
            $feedArray[$position]->setPublisher($publisher);
            $feedArray[$position]->setBody($body);
            $feedArray[$position]->setSource($source);

            return $feedArray;

        }

        public function deleteFeed($position,$feedArray){

            $feedArray = array_splice($feedArray,1,$position);

            return $feedArray;

        }

        public function showAll($feedArray){

            foreach ($feedArray as $key => $feed) {
                
                require DIR_VIEWS.'feed/list.php';
            
            }

        }

    }

?>