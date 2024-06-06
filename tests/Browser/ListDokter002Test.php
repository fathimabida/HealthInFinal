<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ListDokter002Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group listDokter2
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->type('email', 'mahasiswa@gmail.com')
                    ->type('password', 'mahasiswa')
                    ->press('Log In')
                    ->assertPathIs('/mahasiswa')
                    ->clickLink('Cari Dokter')
                    ->assertPathIs('/listdokter');

        });
    }
}
