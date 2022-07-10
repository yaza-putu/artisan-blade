<?php


namespace ArtisanBlade\Tests;

use ArtisanBlade\Commands\ArtisanBladeCommand;

class ArtisanCommandTest extends TestCase
{
    public function test_create_file()
    {
        $command = new ArtisanBladeCommand();
        $command->createBlade("user/profile");
    }
}
