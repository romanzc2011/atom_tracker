<?php
include('functions.php');
$json = file_get_contents('data.json');
$data = json_decode($json, true);

if(is_array($data)) {
    krsort($data);
}

switch($_GET['mode']){
 //#################################################################################################################
    case 'status':
        $id = $_GET['id'];
        $data[$id]['status'] = 1;
        save($data);
    break;
 //#################################################################################################################
    case 'restore':
        if(is_array($data)){
            foreach($data as $task){
                if($task['status'] == 2){ continue; }
                ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= date_nice($task['date_start']); ?></td>
                    <td><?php
                        if($task['date_end'] != ''){
                            echo date_nice($task['date_end']);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if($task['date_end'] == ""){
                            echo time_nice(time()-$task['date_start']);
                        }else{
                            echo time_nice($task['date_end'] - $task['date_start']);
                        }
                        ?>
                    </td>
                    <td class="btn-col"></td>
                    <td class="btn-col"><button data-id="<?= $task['id']?>" class="btn btn-info btn-restore"><?= set_icon('refresh'); ?></button></td>
                </tr>
            <?php }
        }
    break;
//#################################################################################################################
    case 'remove':
        $id = $_GET['id'];
        $data[$id]['status'] = 2;
        save($data);
    break;
//#################################################################################################################
    case 'stop':
        $id = $_GET['id'];
        $data[$id]['date_end'] = time();
        save($data);

    break;
//#################################################################################################################
    case 'new':
        $time = time();
        $data[$time]['id'] = $time;
        $data[$time]['name'] = $_GET['name'];
        $data[$time]['date_start'] = $time;
        $data[$time]['date_end'] = '';
        $data[$time]['status'] = 1;
        save($data);
    break;
//#################################################################################################################
    case 'tally':
        $count = 0;
        if(is_array($data)) {
            foreach ($data as $task) {
                if($task['date_end'] == ''){ $task['date_end'] = time(); }
                if($task['status'] != 1){ continue; }
                $count = $count + (intval($task['date_end']) - intval($task['date_start']));
            }
            echo time_nice($count);
        }
        break;
//#################################################################################################################
    case 'build':
        if(is_array($data)){
            foreach($data as $task){
                if($task['status'] != 1){ continue; }
                ?>
                <tr>
                    <td><?= $task['name'] ?></td>
                    <td><?= date_nice($task['date_start']); ?></td>
                    <td><?php
                        if($task['date_end'] != ''){
                            echo date_nice($task['date_end']);
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if($task['date_end'] == ""){
                            echo time_nice(time()-$task['date_start']);
                        }else{
                            echo time_nice($task['date_end'] - $task['date_start']);
                        }
                        ?>
                    </td>
                    <td class="btn-col"><button data-id="<?= $task['id']?>" class="btn btn-primary btn-stop" <?=($task['date_end'] != '')? 'disabled': ''; ?>><?= set_icon('stop'); ?></button></td>
                    <td class="btn-col"><button data-id="<?= $task['id']?>" class="btn btn-danger btn-remove"><?= set_icon('times'); ?></button></td>
                </tr>
            <?php }
        }
        break;
}

