<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    public function getUsers()
    {
        return $this->db->table('krda_loginreg')->get_all();
    }
    public function searchUser($id)
    {
        return $this->db->table('krda_loginreg')->where('id', $id)->get()->getRowArray();
    }
    public function addUser($data)
    {
        return $this->db->table('krda_loginreg')->insert($data);
    }
    public function updateToken($id,$data)
    {
        return $this->db->table('krda_loginreg')->where('id',$id)->update($data);
    }
    public function generateOTP($userId)
    {
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiry = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        $this->db->table('krda_loginreg')->where('id', $userId)->update([
            'otp' => $otp,
            'otp_expiry' => $expiry
        ]);
        return $otp;
    }

    public function verifyOTP($userId, $otp)
{
    // Fetch the user matching the id and otp (removed otp_expiry check)
    $user = $this->db->table('krda_loginreg')
        ->where('id', $userId)
        ->where('otp', $otp)
        ->get();  // Assuming get() returns an array directly
    
    // If user exists (ensure it's not empty)
    if (!empty($user)) {
        $this->db->table('krda_loginreg')
            ->where('id', $userId)
            ->update([
                'token' => 'verified',
                'otp' => null,
                'otp_expiry' => null
            ]);
        return true;
    }

    return false;
}

    
}
?>