<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@upload_DIR', dirname(dirname(__DIR__)) . '/backend/img/uploads/');
Yii::setAlias('@SERVER', 'http://'.$_SERVER['HTTP_HOST']. '/50foracausedev/backend/img/uploads/'); 
Yii::setAlias('@paging', '5');
