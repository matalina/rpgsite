<?php

class PageTableTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('pages')->truncate();

		$pagetable = array(
            'title' => 'Home',
            'slug' => 'home',
            'entry' => "# In the Beginning\n\nWhen this interlude was over, Captain Mayhew began a dark story concerning Moby Dick; not, however, without frequent interruptions from Gabriel, whenever his name was mentioned, and the crazy sea that seemed leagued with him. It seemed that the Jeroboam had not long left home, when upon speaking a whale-ship, her people were reliably apprised of the existence of Moby Dick, and the havoc he had made. Greedily sucking in this intelligence, Gabriel solemnly warned the captain against attacking the White Whale, in case the monster should be seen; in his gibbering insanity, pronouncing the White Whale to be no"
		);

		// Uncomment the below to run the seeder
		DB::table('pages')->insert($pagetable);
	}

}
