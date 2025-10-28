<?php 
    class user extends database {
        function updateUser($userID) {
            // get full and email
            if(!isset($_POST['fullname']) || !isset($_POST['email']) || empty($_POST['email']) || empty($_POST['fullname'])) {
                echo "<div class='bg-light-danger text-danger'>Fill your full name and email</div>";
                return;
            }
            // check if email not in database 
             $user = $this->db->prepare("SELECT * FROM users WHERE email = ? and user_id != ?");
            $user->execute([htmlspecialchars($_POST['email']), htmlspecialchars($userID)]);
            if($user->rowCount() > 0) {
                 echo "<div class='bg-light-danger text-danger'>Email already exits</div>";
                return;
            }
            // update 
             $update = $this->db->prepare("UPDATE users SET full_name = ?, email = ? WHERE user_id = ?");
            $update = $update->execute([htmlspecialchars($_POST['fullname']), htmlspecialchars($_POST['email']), $userID]);
            if($update) {
                 echo "<div class='bg-light-success text-success'>Profile updated successfully</div>";
            } else {
                 echo "<div class='bg-light-danger text-danger'>Error updating profile</div>";
            }
        }
    }