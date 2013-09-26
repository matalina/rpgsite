<?php

class ConfigTableTableSeeder extends Seeder {

	public function run()
	{
		DB::table('config')->truncate();

		$configtable = array(
            'name' => 'site-name',
            'description' => 'Name of your Forums',
            'type' => 'string',
            'value' => 'RPG Forum'
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'site-tag-line',
            'description' => 'Site Tag Line',
            'type' => 'string',
            'value' => 'The perfect RPG forum'
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'site-description',
            'description' => 'Site Description',
            'type' => 'string',
            'value' => 'The perfect RPG forum software written on top of Laravel 4'
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'top-secret',
            'description' => 'Top Secret Phrase',
            'type' => 'string',
            'value' => Hash::make('t0pSecret!')
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'blog-post-per-page',
            'description' => 'How many Blog Posts per Page',
            'type' => 'number',
            'value' => '10'
		);

		DB::table('config')->insert($configtable);
		
		
		$configtable = array(
            'name' => 'char-approval',
            'description' => 'Require Character Approval',
            'type' => 'boolean',
            'value' => 'true'
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'char-limit',
            'description' => 'Character Limit (0 for unlimited)',
            'type' => 'number',
            'value' => '0'
		);

		DB::table('config')->insert($configtable);
		
		$configtable = array(
            'name' => 'admin-limit',
            'description' => 'Admin Page Limit for viewing tables',
            'type' => 'number',
            'value' => '25'
		);

		DB::table('config')->insert($configtable);
	}

}
