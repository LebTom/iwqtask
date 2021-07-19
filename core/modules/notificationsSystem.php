<?php
    /*                              */
    /* notifications system - begin */
    /*                              */

    //get notification description
    function getNotificationDescription(Array $notificationArray){
        $notificationType = $notificationArray['notificationType'];

        //notifications description array
        $notificationDescription = [
            'userRemoved' => ['Użytkownik został pomyślnie usunięty z systemu.', 'success'],
            'userModified' => ['Użytkownik został pomyślnie zmodyfikowany.', 'success'],
            'userCreated' => ['Użytkownik został pomyślnie dodany do systemu.', 'success']
        ];

        //return notification description or nothing
        if(!empty($notificationType)){
            return $notificationDescription[reset($notificationType)];
        }
        else{
            return 0;
        }
    }

    /*                            */
    /* notifications system - end */
    /*                            */
?>