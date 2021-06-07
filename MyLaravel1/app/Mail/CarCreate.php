<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Car;

class CarCreate extends Mailable
{
    use Queueable, SerializesModels;

    public $car;
    
    public function __construct($car)
    {
        $this -> car = $car;
    }

    
    public function build()
    {   

        return $this->view('mail.car-create')
                    ->with([
                        'carId' => $this -> car -> id,
                        'carModel' => $this -> car -> model,
                        'carKw' => $this -> car -> kW,
                        'carBrand' => $this -> car -> brand -> name,
                    ]);
    }
}
