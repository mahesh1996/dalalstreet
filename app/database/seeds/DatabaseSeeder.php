<?php

class DatabaseSeeder extends Seeder {

	public function run() {
		Eloquent::unguard();
		$this->call('CompanySeeder');
    $this->call('PlayerSeeder');
    $this->call('UserSeeder');
    $this->call('SettingSeeder');
    $this->call('NewsSeeder');
	}

}