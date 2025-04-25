<?php

dd($_SESSION['areaadmin']['areaadminid']);

$notification = $db->query(
  'SELECT * FROM issues WHERE adminid = :areaadminid', [
    'areaadminid' => $_SESSION['areaadmin']['areaadminid']
  ]);