<?php

class TamuController extends BaseController {

	protected $layout ='tampil.tamu';

	public function login()
	{
		$this->layout->content=View::make('tamu.login');
	}
	public function signup()
    {
        $this->layout->content = View::make('tamu.signup');
    }


    public function register()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Register User tanpa diaktivasi
        $user = Sentry::register(array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name')
        ), false);

        // Cari grup regulara online
        $regulerGroup = Sentry::findGroupByName('reguler');

        // Masukkan user ke grup regular
        $user->addGroup($regulerGroup);

        // Persiapkan activation code untuk dikirim ke email
        $data = [
            'email'=>$user->email,
            // Generate kode aktivasi
            'activationCode'=>$user->getActivationCode()
        ];

        // Kirim email aktivasi
        Mail::send('emails.auth.register', $data, function ($message) use ($user) {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Aktivasi Akun Dafara online');
        });

        // Redirect ke halaman login
        return Redirect::route('tamu.login')->with("successMessage", "Silahkan cek email Anda ($user->email) untuk melakukan aktivasi akun.");
    }


      public function activate()
    {
        $email = Input::get('email');
        $activationCode = Input::get('activationCode');

        try {
            $user = Sentry::findUserByLogin($email);
            $user->attemptActivation($activationCode);
        } catch (UserAlreadyActivatedException $e) {
            return Redirect::route('tamu.login')->with('errorMessage', $e->getMessage());
        } catch (UserNotFoundException $e)  {
            return Redirect::route('tamu.login')->with('errorMessage', $e->getMessage());
        }

        return Redirect::route('tamu.login')
            ->with('successMessage', 'Akun Anda berhasil diaktivasi, silahkan login.');
    }
}