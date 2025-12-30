<?php

namespace App\Console\Commands;
use App\Models\Driver;
use App\Models\Meetings;
use App\Models\RaceSessions;
use App\Models\LapTime;
use App\Models\CarData;
use App\Models\Pit;
use App\Models\Position;
use App\Models\RaceControl;
use App\Models\Stints;
use App\Models\Weather;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportF1Data extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-f1-data';
    // protected $signature = 'f1:import {--type=drivers}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import F1 data from OpenF1 API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->option('type');
        if ($type === 'drivers') {
            $this->importDrivers($this->option('session_key'));
        }
        if ($type === 'meetings') {
            $this->importMeetings($this->option('year'), $this->option('country_name'));
        }
        if ($type === 'sessions') {
            $this->importRaceSessions($this->option('country_name'), $this->option('session_name'), $this->option('year'));
        }
        if ($type === 'laps') {
            $this->importLapTime($this->option('session_key'), $this->option('driver_number'), $this->option('lap_number'));
        }
        if ($type === 'car_data') {
            $this->importCarData($this->option('session_key'), $this->option('driver_number'));
        }
        if ($type === 'pit') {
            $this->importPit($this->option('session_key'), $this->option('driver_number'));
        }
        if ($type === 'position') {
            $this->importPosition($this->option('session_key'), $this->option('driver_number'));
        }
        if ($type === 'race_control') {
            $this->importRaceControl($this->option('session_key'), $this->option('driver_number'));
        }
        if ($type === 'stints') {
            $this->importStints($this->option('session_key'), $this->option('driver_number'));
        }
        if ($type === 'weather') {
            $this->importWeather($this->option('session_key'), $this->option('driver_number'));
        }
    }

    // Drivers Sample URL: https://api.openf1.org/v1/drivers?driver_number=1&session_key=9158
    protected function importDrivers($session_key)
    {
        $this->info('Importing drivers...');

        try {
            $response = Http::get('https://api.openf1.org/v1/drivers?session_key=' . $session_key);
            $drivers = $response->json();

            foreach ($drivers as $driverData) {
                Driver::updateOrCreate(
                    ['driver_number' => $driverData['driver_number']],
                    $driverData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import drivers: ' . $e->getMessage());
        }
        $this->info('Drivers imported successfully!');
    }

    // Meetings Sample URL: https://api.openf1.org/v1/meetings?year=2023&country_name=Singapore
    protected function importMeetings($year, $country_name)
    {
        $this->info('Importing meetings...');

        try {
            $response = Http::get('https://api.openf1.org/v1/meetings?year=' . $year . '&country_name=' . $country_name);
            $meetings = $response->json();

            foreach ($meetings as $meetingData) {
                Meetings::updateOrCreate(
                    ['meeting_key' => $meetingData['meeting_key']],
                    $meetingData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import meetings: ' . $e->getMessage());
        }
        $this->info('Meetings imported successfully!');
    }

    // Sessions Sample URL: https://api.openf1.org/v1/sessions?country_name=Belgium&session_name=Sprint&year=2023
    protected function importRaceSessions($country_name, $session_name, $year)
    {
        $this->info('Importing sessions...');

        try {
            $response = Http::get('https://api.openf1.org/v1/sessions?country_name=' . $country_name . '&session_name=' . $session_name . '&year=' . $year);
            $sessions = $response->json();

            foreach ($sessions as $sessionData) {
                RaceSessions::updateOrCreate(
                    ['session_key' => $sessionData['session_key']],
                    $sessionData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import sessions: ' . $e->getMessage());
        }

        $this->info('Sessions imported successfully!');
    }

    // Lap Time Sample URL: https://api.openf1.org/v1/laps?session_key=9161&driver_number=63&lap_number=8
    protected function importLapTime($session_key, $driver_number, $lap_number)
    {
        $this->info('Importing laps...');

        try {
            $response = Http::get('https://api.openf1.org/v1/laps?session_key=' . $session_key . '&driver_number=' . $driver_number . '&lap_number=' . $lap_number);
            $laps = $response->json();

            foreach ($laps as $lapData) {
                LapTime::updateOrCreate(
                    ['lap_key' => $lapData['lap_key']],
                    $lapData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import laps: ' . $e->getMessage());
        }

        $this->info('Laps imported successfully!');
    }

    // Car Data Sample URL: https://api.openf1.org/v1/car_data?driver_number=55&session_key=9159&speed>=315
    protected function importCarData($driver_number, $session_key)
    {
        $this->info('Importing car data...');

        try {
            $response = Http::get('https://api.openf1.org/v1/car_data?session_key=' . $session_key . '&driver_number=' . $driver_number);
            $carData = $response->json();

            foreach ($carData as $carsData) {
                CarData::updateOrCreate(
                    ['car_data_key' => $carsData['car_data_key']],
                    $carsData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import car data: ' . $e->getMessage());
        }

        $this->info('Car data imported successfully!');
    }

    // Pit Data Sample URL: https://api.openf1.org/v1/pit?session_key=9158&pit_duration<31
    protected function importPitData($session_key)
    {
        $this->info('Importing pit data...');

        try {
            $response = Http::get('https://api.openf1.org/v1/pit?session_key=' . $session_key);
            $pitData = $response->json();

            foreach ($pitData as $pitsData) {
                Pit::updateOrCreate(
                    ['pit_key' => $pitsData['pit_key']],
                    $pitsData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import pit data: ' . $e->getMessage());
        }

        $this->info('Pit data imported successfully!');
    }

    // Position Sample URL: https://api.openf1.org/v1/position?meeting_key=1217&driver_number=40&position<=3
    protected function importPosition($meeting_key, $driver_number)
    {
        $this->info('Importing position...');

        try {
            $response = Http::get('https://api.openf1.org/v1/position?meeting_key=' . $meeting_key . '&driver_number=' . $driver_number);
            $positionData = $response->json();

            foreach ($positionData as $positionsData) {
                Position::updateOrCreate(
                    ['position_key' => $positionsData['position_key']],
                    $positionsData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import position: ' . $e->getMessage());
        }

        $this->info('Position imported successfully!');
    }

    // Race Control Sample URL: https://api.openf1.org/v1/race_control?flag=BLACK%20AND%20WHITE&driver_number=1&date%3E=2023-01-01&date%3C2023-09-01
    protected function importRaceControl($session_key)
    {
        $this->info('Importing race control...');

        try {
            $response = Http::get('https://api.openf1.org/v1/race_control?session_key=' . $session_key);
            $raceControlData = $response->json();

            foreach ($raceControlData as $raceControlsData) {
                RaceControl::updateOrCreate(
                    ['race_control_key' => $raceControlsData['race_control_key']],
                    $raceControlsData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import race control: ' . $e->getMessage());
        }

        $this->info('Race control imported successfully!');
    }

    // Stints Sample URL: https://api.openf1.org/v1/stints?session_key=9165&tyre_age_at_start>=3
    protected function importStints($session_key, $driver_number)
    {
        $this->info('Importing stints...');

        try {
            $response = Http::get('https://api.openf1.org/v1/stints?session_key=' . $session_key . '&driver_number=' . $driver_number);
            $stintsData = $response->json();

            foreach ($stintsData as $stintsData) {
                Stints::updateOrCreate(
                    ['stint_key' => $stintsData['stint_key']],
                    $stintsData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import stints: ' . $e->getMessage());
        }

        $this->info('Stints imported successfully!');
    }

    // Weather Sample URL: https://api.openf1.org/v1/weather?session_key=9158&driver_number=1
    protected function importWeather($session_key, $meeting_key)
    {
        $this->info('Importing weather...');

        try {
            $response = Http::get('https://api.openf1.org/v1/weather?session_key=' . $session_key . '&meeting_key=' . $meeting_key);
            $weatherData = $response->json();

            foreach ($weatherData as $WeatherData) {
                Weather::updateOrCreate(
                    ['weather_key' => $WeatherData['weather_key']],
                    $WeatherData
                );
            }
        } catch (\Exception $e) {
            $this->error('Failed to import weather: ' . $e->getMessage());
        }

        $this->info('Weather imported successfully!');
    }
}
