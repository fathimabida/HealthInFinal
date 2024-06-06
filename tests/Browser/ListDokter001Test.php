<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ListDokter001Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group listDokter
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->visit('/')
                        ->type('email', 'admin@gmail.com')
                        ->type('password', 'admin')
                        ->press('Log In')
                        ->visit('/listDokterA')
                        ->press('edit')
                        ->press('Save')
                        ->assertPathIs('/listDokterA')
                        ->press('delete');
            
                // Beralih ke alert dan tekan tombol "OK"
                $browser->driver->switchTo()->alert()->accept();
            
                // Setelah menekan OK pada alert, verifikasi bahwa pengguna diarahkan kembali ke halaman '/listDokterA'
                $browser->assertPathIs('/listDokterA');
            });                    
                




                    

        });
    }
}
