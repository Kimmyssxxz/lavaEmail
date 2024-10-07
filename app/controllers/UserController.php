<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserController extends Controller {

    public function __construct(){
        parent::__construct();
        $this->call->library('session');
        $this->call->library('email');
        $this->call->model('UserModel');
        $this->getusers = $this->UserModel->getusers();
    }
	public function login(){
        return $this->call->view('login');
    }
	public function register(){
        return $this->call->view('register');
    }
	public function upload(){
        return $this->call->view('upload_form');
    }
    public function logout()
    {
        // $arr = array('userEmail');
        // $this->session->unset_userdata($arr);
        $this->session->sess_destroy();
        redirect('login');
    }
    //ito yong mag upload ng file at ichecheck if jpg or jpeg yong iupload sa email
	public function uploadFile(){
        $this->call->library('upload', $_FILES["userfile"]);
		$this->upload
			->set_dir('public')
			->allowed_extensions(array('jpg'))
			->allowed_mimes(array('image/jpeg'))
			->is_image();
		if($this->upload->do_upload()) {
			$data['filename'] = $this->upload->get_filename();
            $name = $this->io->post('name');
            $recepient_email = $this->io->post('email');
            $subject = $this->io->post('subject');
            $content = $this->io->post('content');
            $path = realpath(__DIR__ . '/../../public/' . $this->upload->get_filename());
            $this->sendAttatchedEmail($name,$recepient_email,$subject,$content,$path);
			$this->call->view('upload_success', $data);
		} else {
			$data['errors'] = $this->upload->get_errors();
			$this->call->view('upload_form', $data);
		}
    }
    public function create() {
        // retrieve form input values
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        // add user inputs to an array and continue with the insertion of data to the database with hashed token & password for security
        $data = array(
            "email" => $email,
            "password"=> password_hash($password,PASSWORD_DEFAULT),
            "token" => "unverified",
        );
        $this->UserModel->addUser($data);
        redirect('/login');
    }
    //store yong email at password at automatic ang token ay unverified if hindi pa nasesend sa gmail ang authentication
    public function auth() {    
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $users = $this->getusers;
        foreach ($users as $user) {
            if ($email == $user['email']) {
                if (password_verify($password, $user['password'])) {
                    if($user['token'] == "unverified")
                    {
                        //generate and sending to email
                        $otp = $this->UserModel->generateOTP($user['id']);
                        $subject = "Your OTP for Email Verification - LavaLust 4";
                        $content = "Hello,<br><br>Your OTP for email verification is: <strong>{$otp}</strong><br><br>This OTP will expire in 15 minutes.<br><br>If you didn't request this, please ignore this email.<br><br>Best regards,<br>Your App Team";
                        $this->sendEmailVerification($email, $subject, $content);
                        
                        $this->session->set_userdata('user_id_for_verification', $user['id']);
                        
                         // Show unverified view
                    $data['email'] = $user['email'];
                    $this->call->view('unverified', $data);
                    return; 




                    } else {
                        $this->session->set_userdata('email', $user['email']);
                        $data['email'] = $this->session->userdata('email');
                        $this->call->view('verified', $data);
                    }
                    return;
                }
            }
        }
        redirect('login');
    }

    public function enterOTP()
    {
        $this->call->view('enter_otp');
    }

    public function verifyOTP()
    {
        $userId = $this->session->userdata('user_id_for_verification');
        $otp = $this->io->post('otp');

        if ($this->UserModel->verifyOTP($userId, $otp)) {
            $this->session->unset_userdata('user_id_for_verification');
            $this->call->view('verified');
        } else {
            $data['error'] = 'Invalid or expired OTP. Please try again.';
            $this->call->view('enter_otp', $data);
        }
    }

    // public function generateRandomString($length = 60) {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     $charactersLength = strlen($characters);
    //     $randomString = '';
    //     for ($i = 0; $i < $length; $i++) {
    //         $randomString .= $characters[random_int(0, $charactersLength - 1)];
    //     }
    //     return $randomString;
    // }

    public function sendEmailVerification($recepient_email,$subject,$content)
    {
       
        $this->email->sender('kimanonuevo59@gmail.com', 'Lavalust4EmailActivity');
        $this->email->recipient($recepient_email);
        $this->email->subject($subject);
        $this->email->email_content($content,"html");
        $this->email->send();
    }

    public function sendAttatchedEmail($name,$recepient_email,$subject,$content,$path)
    {
    
        $fullContent = "Hello, <br><br>This is a sample email.<br>These are the email's contents: <br>" . $content;
        $this->email->sender($this->session->userdata('email'), $name);
        $this->email->recipient($recepient_email);
        $this->email->subject($subject);
        $this->email->email_content($fullContent,'html');
        $this->email->attachment($path);
        $this->email->send();
    }
   
}
