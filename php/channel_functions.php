<?php

	function getChannelIDs($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT channelID FROM ChannelUsers WHERE ? = accountID');
        $stmt->execute(array($accountID)); 
        $row = $stmt->fetchAll();

        return $row;
    }
    function getChannelName($dbh, $channelID){

        $stmt = $dbh->prepare('SELECT description FROM Channel WHERE ? = channelID');
        $stmt->execute(array($channelID)); 
        $row = $stmt->fetch();

        return $row['description'];
    }
    function getSubscription($dbh, $accountID, $channelID){

        $cIDs = getChannelIDs($dbh, $accountID);

        foreach($cIDs as $cID){

            if($cID['channelID'] == $channelID)
                return 1;
        }
        return 0;
    }
    function getNumberSubscriber($dbh, $channelID){

        $stmt = $dbh->prepare('SELECT COUNT(*) FROM ChannelUsers WHERE channelID = ?');
        $stmt->execute(array($channelID));
        $row = $stmt->fetch();
        
        return $row[0];
    }


    function discoverChannels($dbh, $accountID){

        $stmt = $dbh->prepare('SELECT channelID FROM Channel EXCEPT SELECT channelID FROM ChannelUsers WHERE accountID = ?');
        $stmt->execute(array($accountID));
        $channels = $stmt->fetchAll();

        return $channels;
    }

?>