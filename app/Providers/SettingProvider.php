<?php

    namespace App\Providers;

    use App\Models\Setting;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Support\ServiceProvider;

    class SettingProvider extends ServiceProvider
    {
        /**
         * Register services.
         */
        public function register(): void
        {
            //
        }

        /**
         * Bootstrap services.
         */
        public function boot(): void
        {
            if (Schema::hasTable('settings')) {
                $settingKeys = [
                    'facebook_link'   => 'https://facebook.com/yourpage',
                    'youtube'         => 'https://youtube.com/yourchannel',
                    'instagram'       => 'https://instagram.com/yourprofile',
                    'tiktok'          => 'https://tiktok.com/@yourprofile',
                    'logo'            => 'images/sahoo-logo.svg',
                    'phone_number_1'  => '+123456789',
                    'phone_number_2'  => '',
                    'sms_number_1'    => '',
                    'sms_number_2'    => '',
                    'email'           => 'info@example.com',
                    'fax_1'           => '',
                    'fax_2'           => '',
                    'address_1'       => '123 Main St',
                    'address_2'       => '',
                    'address_3'       => '',
                    'whatsapp_number' => '201006567821',
                ];

                foreach ($settingKeys as $key => $value) {
                    Setting::firstOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );
                }

                $settings = Setting::all()->pluck('value', 'key');
                view()->share('settings', $settings);
            }

        }
    }
