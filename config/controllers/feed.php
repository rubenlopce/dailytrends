<?php

    class FeedController{

        public function createFeed(){

        }

        public function showFeed(){

        }

        public function updateFeed(){

        }

        public function deleteFeed(){

        }

        public function showAll($feedArray){

            foreach ($feedArray as $key => $feed) {
                
                require 'config/views/feed/list.php';
            
            }

        }

    }

?>