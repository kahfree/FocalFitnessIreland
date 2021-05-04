<?php
namespace App\Helpers;
Class Filter {

    public static function clientCheckUserType()
	{
		//If the user isn't logged in, redirect to home page
		if(!session()->get('loggedIn'))
			return redirect()->to('/');
		else
		{
			//If the user isn't a client, redirect to moderator dashboard
			if(session()->get('userType') != 'Client')
				return redirect()->to('/Moderator');
		}
	}
    
}

