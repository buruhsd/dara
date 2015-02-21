<?php

class SentrySeeder extends Seeder {

	public function run()
	{
		DB::table('users_groups')->delete();
		DB::table('groups')->delete();
		DB::table('users')->delete();
		DB::table('throttle')->delete();

		try
		{
			$group=Sentry::createGroup(array(
				'name' =>'admin',
				'permissions'=>array(
					'admin'=>1,
					),
				));
			$group=Sentry::createGroup(array(
				'name' =>'reguler',
				'permissions'=>array(
					'reguler'=>1,
					),
				));
		}
		catch (Cartalyst\Sentry\Groups\NameRequiredException $e)
		{
			echo "Field Nama harus di isi";
		}
		catch (Cartalyst\Sentry\Groups\GroupsExistsException $e)
		{
			echo "Group sudah ada";
		}

		try
		{
			$admin=Sentry::register(array(
				'email'=>'buruhsd@outlook.co.id',
				'password'=>'admin',
				'first_name'=>'Muhammad',
				'last_name'=>'Al Jawad'
			), true);

			$adminGroup=Sentry::findGroupByName('admin');
			$admin->addGroup($adminGroup);

			$user=Sentry::register(array(
				'email'=>'dara@fa.com',
				'password'=>'reguler',
				'first_name'=>'Dara',
				'last_name'=>'fatmawati'
			), true);

			$regulerGroup=Sentry::findGroupByName('reguler');

			$user->addGroup($regulerGroup);
		}

		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			echo "Field Login wajib di isi";
		}

		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			echo "Field password wajib di isi";
		}

		catch (Cartalyst\Sentry\Users\UserExistsException $e)
		{
			echo "User dengan login ini sudah ada";
		}

		catch (Cartalyst\Sentry\Users\GroupNotFoundException $e)
		{
			echo "Group tidak ketemu";
		}
	}
}