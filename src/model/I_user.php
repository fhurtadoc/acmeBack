<?php
interface I_user {

    public function create_user($user);

    public function listAll_user($rol);

    public function userFor_id($id, $rol);

}

?>