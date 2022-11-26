<?php
$sort_param = "cpu";

if (isset($argv[1])) {
    if ($argv[1] == "mem") {
	    $sort_param = "mem";
    }
}

$output = shell_exec("bash container_name.sh");

$output = str_replace('"', "", $output);

$container_list = explode("\n", $output, -1);

$container_arr = array();
$containers = array();

foreach ($container_list as $value) {
    list($name, $image) = explode(", ", $value);
    $container_arr["name"] = $name;
    $container_arr["image"] = $image;
    array_push($containers, $container_arr);
}

$processes_arr = array();

foreach ($containers as &$container) {
    $container_name = $container["name"];
    $output = shell_exec("bash top.sh $container_name $sort_param");
    $process_list = explode("\n", $output, -1);
    unset($process_list[0]);

    foreach ($process_list as $process) {
        $process = preg_replace('!\s+!', ' ', $process);
        list($pid, $command, $arg) = explode(" ", $process, 3);
        $process_arr["pid"] = $pid;
        $process_arr["command"] = $command;
        $process_arr["arg"] = $arg;
        array_push($processes_arr, $process_arr);
    }
    $container["top"] = $processes_arr;
    unset($processes_arr);
    $processes_arr = array();

}

echo json_encode($containers);
echo "\n";

?>
