<?php

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
        $genres = Genre::all();
        $user = User::first();
    	DB::table('projects')->delete();

        $project = new Project();
        $project->project_title = "Jurassic Shark";
        $project->synopsis = "A prehistoric shark has been discovered and is reaking havoc in the pacific ocean";
        $project->start_date = '2016-01-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 5000;
        $project->funds_current = 1000;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/jRf0oU3sdqA'; 
        $project->thumbnail_url = 'http://img.youtube.com/vi/jRf0oU3sdqA/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "The Stepfather";
        $project->synopsis = "Michael Borleone must take over the family business of italian sandwich shops while fighting off bitter rivals";
        $project->start_date = '2015-05-04';
        $project->complete_date = '2015-09-01';
        $project->funds_goal = 10000;
        $project->funds_current = 2000;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/sY1S34973zA';
        $project->thumbnail_url = 'http://img.youtube.com/vi/sY1S34973zA/0.jpg'; 
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Wedding Smashers";
        $project->synopsis = "Fun loving guys go to weddings univited and intentionally smash the wedding cake";
        $project->start_date = '2015-04-03';
        $project->complete_date = '2015-11-13';
        $project->funds_goal = 7000;
        $project->funds_current = 0;
        $project->funds_end_date = '2015-03-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/ZeUSo8voIXM';
        $project->thumbnail_url = 'http://img.youtube.com/vi/ZeUSo8voIXM/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Gone with the air";
        $project->synopsis = "Set in the civil war, scarlette is in love with two men but only one can win her heart";
        $project->start_date = '2015-09-23';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 34000;
        $project->funds_current = 4000;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/8mM8iNarcRc';
        $project->thumbnail_url = 'http://img.youtube.com/vi/8mM8iNarcRc/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Code Life";
        $project->synopsis = "Code life follows Isaac, a coder out for revenge on a angry mob of anti coders";
        $project->start_date = '2015-01-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 100000000;
        $project->funds_current = 96784;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/ZirgAYBcOgo';
        $project->thumbnail_url = 'http://img.youtube.com/vi/ZirgAYBcOgo/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Star Battles";
        $project->synopsis = "The Jebi must face certain evil in a intergalatic battle for the stars";
        $project->start_date = '3040-01-01';
        $project->complete_date = '3050-01-01';
        $project->funds_goal = 700000000;
        $project->funds_current = 1;
        $project->funds_end_date = '2018-10-03';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.www.youtube.com/embed/OMOVFvcNfvE';
        $project->thumbnail_url = 'http://img.youtube.com/vi/OMOVFvcNfvE/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Saving coder Ryan";
        $project->synopsis = "A group of seasoned coding vets set off to find Ryan, the last coder of 5 coding brothers";
        $project->start_date = '2015-06-19';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 13000;
        $project->funds_current = 3000;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/zwhP5b4tD6g';
        $project->thumbnail_url = 'http://img.youtube.com/vi/zwhP5b4tD6g/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Freezing";
        $project->synopsis = "A warm tale of two sisters who grew up apart but have to come together to save their kingdom";
        $project->start_date = '2015-08-23';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 20000;
        $project->funds_current = 4300;
        $project->funds_end_date = '2015-01-05';
        $project->stage = "pre-production";
        $project->video_url = 'http://www.youtube.com/embed/TbQm5doF_Uc';
        $project->thumbnail_url = 'http://img.youtube.com/vi/TbQm5doF_Uc/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Cubicle Space";
        $project->synopsis = "Mark has a average job in a average company for average pay. One day he decides to quit and see what life has in store";
        $project->start_date = '2015-03-04';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 40000;
        $project->funds_current = 100;
        $project->funds_end_date = '2015-02-25';
        $project->stage = "pre-production";
        $project->video_url = 'http://youtube.com/embed/_IwzZYRejZQ';
        $project->thumbnail_url = 'http://img.youtube.com/vi/_IwzZYRejZQ/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Wolf of ceiling st";
        $project->synopsis = "Marty is fresh out of college and has started his new job on ceiling st.";
        $project->start_date = '2015-09-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 30000;
        $project->funds_current = 20000;
        $project->funds_end_date = '2016-01-02';
        $project->stage = "pre-production";
        $project->video_url = 'http://youtube.com/embed/iszwuX1AK6A';
        $project->thumbnail_url = 'http://img.youtube.com/vi/iszwuX1AK6A/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Planet of the Monkeys";
        $project->synopsis = "Super genetic enhanced monkeys revolt against their creators and start a all out war";
        $project->start_date = '2015-07-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 75000;
        $project->funds_current = 50;
        $project->funds_end_date = '2015-03-10';
        $project->stage = "pre-production";
        $project->video_url ='http://www.youtube.com/embed/R6oOuWiDYlo';
        $project->thumbnail_url = 'http://img.youtube.com/vi/R6oOuWiDYlo/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "New School";
        $project->synopsis = "BJ and his old buddies have to go back to school in order to save his old fraternity from sudden doom";
        $project->start_date = '2016-01-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 100000;
        $project->funds_current = 3000;
        $project->funds_end_date = '2015-03-04';
        $project->stage = "pre-production";
        $project->video_url ='http://www.youtube.com/embed/VqtymOtKr48';
        $project->thumbnail_url = 'http://img.youtube.com/vi/VqtymOtKr48/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Superthing";
        $project->synopsis = "A new hero has emerged from the shadows but is he really here to help us or is he here to take over?";
        $project->start_date = '2015-09-23';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 45000;
        $project->funds_current = 1000;
        $project->funds_end_date = '2015-02-04';
        $project->stage = "pre-production";
        $project->video_url ='http://www.youtube.com/embed/68hRt0Pz7HI';
        $project->thumbnail_url = 'http://img.youtube.com/vi/68hRt0Pz7HI/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Black Hole";
        $project->synopsis = "A black hole appears and destroys a entire coharts worth of capstone projects";
        $project->start_date = '2015-01-01';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 35000;
        $project->funds_current = 350;
        $project->funds_end_date = '2015-05-23';
        $project->stage = "pre-production";
        $project->video_url ='http://www.youtube.com/embed/OVlnER8SxfQ';
        $project->thumbnail_url = 'http://img.youtube.com/vi/OVlnER8SxfQ/0.jpg';
        $project->user_id = $user->id;
        $project->save();

        $project = new Project();
        $project->project_title = "Boomshackalaka";
        $project->synopsis = "A feel good story about a guy who just loves to code. When he gets no erros he says Boomshackalak";
        $project->start_date = '2015-06-19';
        $project->complete_date = '9999-01-01';
        $project->funds_goal = 60000;
        $project->funds_current = 3500;
        $project->funds_end_date = '2015-01-02';
        $project->stage = "pre-production";
        $project->video_url ='http://www.youtube.com/embed/kL5c2szf3E4';
        $project->thumbnail_url = 'http://img.youtube.com/vi/kL5c2szf3E4/0.jpg';
        $project->user_id = $user->id;
        $project->save();
	}
}