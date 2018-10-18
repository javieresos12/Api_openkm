<?php

include '../src/openkm/OpenKM.php';

use openkm\OKMWebServicesFactory;
use openkm\OpenKM;
use openkm\bean\GrantedRole;
use openkm\bean\GrantedUser;
/**
 * TestAuth
 *
 * @author sochoa
 */
class TestAuth {

    const HOST = "http://sibase.garantiascaribe.com:9392/OpenKM/";
    const USER = "chacho";
    const PASSWORD = "Algundia99";
    const TEST_DOC_PATH = "/okm:/okm:root/100_Asamblea_Accionistas/";
    const TEST_DOC_UUID = '97546fe1-ecda-4a63-ae9a-e6c75bc44a1b';    

    private $ws;

    public function __construct() {
        $this->ws = OKMWebServicesFactory::build(self::HOST, self::USER, self::PASSWORD);
    }
    
    public function test() {
        //getGrantedRoles
        echo '<h2>getGrantedRoles aja</h2>';
        $grantedRoles = $this->ws->getGrantedRoles(self::TEST_DOC_UUID);
        foreach ($grantedRoles as $grantedRole) {
            echo '<div style="margin-left:30px">';
            echo '<h3>GrantedRole</h3>';
            echo '<p><strong>Role:</strong>' .$grantedRole->getRole() . '</p>';
            echo '<p><strong>Permissions:</strong>' .$grantedRole->getPermissions() . '</p>';
            echo '</div>';
        }

        //getGrantedUsers
        echo '<h2>getGrantedUsers</h2>';
        $grantedUsers = $this->ws->getGrantedUsers(self::TEST_DOC_UUID);
        foreach ($grantedUsers as $grantedUser) {
            echo '<div style="margin-left:30px">';
            echo '<h3>GrantedUser</h3>';
            echo '<p><strong>User:</strong>' .$grantedUser->getUser() . '</p>';
            echo '<p><strong>Permissions:</strong>' . $grantedUser->getPermissions() . '</p>';
            echo '</div>';
        }

        //getRoles
        echo '<h2>getRoles</h2>';
        $roles = $this->ws->getRoles();
        foreach ($roles as $role) {
            echo '<div style="margin-left:30px">';
            echo '<p>' . $role . '</p>';
            echo '</div>';
        }

        //getUsers
        echo '<h2>getUsers</h2>';
        $users = $this->ws->getUsers();
        foreach ($users as $user) {
            echo '<div style="margin-left:30px">';
            echo '<p>' . $user . '</p>';
            echo '</div>';
        }

        //getUsersByRole
        echo '<h2>getUsersByRole</h2>';
        $users = $this->ws->getUsersByRole('ROLE_ADMIN');
        foreach ($users as $user) {
            echo '<div style="margin-left:30px">';
            echo '<p>' . $user . '</p>';
            echo '</div>';
        }
        
        //getRolesByUser
        echo '<h2>getRolesByUser</h2>';
        $roles = $this->ws->getRolesByUser('chacho');
        foreach ($roles as $role) {
            echo '<div style="margin-left:30px">';
            echo '<p>' . $role . '</p>';
            echo '</div>';
        }
        
        //getMail
        echo '<h2>getMail</h2>';
        echo '<p>' . $this->ws->getMail('chacho') , '</p>';

        //getName
        echo '<h2>getName</h2>';
        echo '<p>' . $this->ws->getName('chacho') . '</p>';
    }

}

$openkm = new OpenKM();
$testAuth = new TestAuth();
$testAuth->test();
?>