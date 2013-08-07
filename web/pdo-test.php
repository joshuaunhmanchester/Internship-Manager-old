<?php
    require_once('Classes/PDOWrapper.php');
    include('inc/util.php');
    $pdo = getPDO();
    if(isset($_POST['testSubmitButton'])) {
        $info = array('last_name' => 'Brown', 'first_name' => 'Jay', 'email' => 'jsa@email.com');
        //$info = array('Josh', 'Smith', 'josh@email.com');
        echo PDOWrapperModel::insert($pdo, 'student', $info);
    }

?>

<form id="testform" method="post">
    <input type="submit" name="testSubmitButton" value="Submit" />
</form>
