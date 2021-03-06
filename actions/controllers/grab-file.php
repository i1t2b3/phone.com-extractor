<?php

$way = strtolower(trim($_GET['way'])) == 'manual' ? 'manual' : 'auto';

// kill hanged
query("UPDATE `import_stats` SET `status`='fail', `error_message`='Hanged' WHERE `status`='in progress'  AND DATE_ADD(`started_at`, INTERVAL 1 HOUR) < NOW()");

$isInProgress = query('SELECT `id` FROM `import_stats` WHERE status="in progress" LIMIT 1')->fetchAll();
if( !empty($isInProgress)) {
    exit('Import in progress');
}

startImport($way, 1);
startImport($way, 2);