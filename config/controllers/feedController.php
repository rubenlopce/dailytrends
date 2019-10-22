<?php

    class feedController{

        public function createFeed($title,$image,$publisher,$body,$source,$linkfeed){

            $nFeed = new Feed();

            $nFeed->setTitle($title);
            $nFeed->setImage($image);
            $nFeed->setPublisher($publisher);
            $nFeed->setBody($body);
            $nFeed->setSource($source);
            $nFeed->setLinkfeed($linkfeed);

            return $nFeed;

        }

        public function showFeed($feed,$position){

            $key = $position;

            require DIR_VIEWS.'feed/list.php';

        }

        public function updateFeed($title,$image,$publisher,$body,$source,$linkfeed,$position,$feedArray){

            $feedArray[$position]->setTitle($title);
            $feedArray[$position]->setImage($image);
            $feedArray[$position]->setPublisher($publisher);
            $feedArray[$position]->setBody($body);
            $feedArray[$position]->setSource($source);
            $feedArray[$position]->setLinkfeed($linkfeed);

            return $feedArray;

        }

        public function deleteFeed($position,$feedArray){

            array_splice($feedArray,$position,1);

            return $feedArray;

        }

        public function showAll($feedArray){

            $feedArray = array_reverse($feedArray, true); 

            foreach ($feedArray as $key => $feed) {
                
                require DIR_VIEWS.'feed/list.php';
            
            }

        }

    }

?>