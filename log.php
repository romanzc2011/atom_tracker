<?php
include('functions.php');
$json = file_get_contents('data.json');
$data = json_decode($json, true);
krsort($data);

switch($_GET['mode']){
//#################################################################################################################

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

        foreach($data as $task) {
            $count = $count + (intval($task['date_end']) - intval($task['date_start']));
        }
        echo time_nice($count);
        break;
//#################################################################################################################
    case 'build':
        foreach($data as $task){?>
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
                <td><button data-id="<?= $task['id']?>" class="btn btn-primary btn-stop"><?= set_icon('stop'); ?></button></td>
                <td><button data-id="<?= $task['id']?>" class="btn btn-danger btn-delete" name="delete" id="delete"><?= set_icon('times'); ?></button></td>
            </tr>
        <?php }
        break;
}

