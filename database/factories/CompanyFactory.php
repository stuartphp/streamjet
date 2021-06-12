<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "attela_reference"=>'000000000000000000',
            "created_by"=>1,
            "trading_name"=>'Demo Company',
            "registered_as"=>'123 Investments Pty(Ltd)',
            "registration_number"=>'12345/67890/07',
            "vat_number"=>'1234567890',
            "contact_name"=>'Demo Bos',
            "contact_number"=>'0821234567',
            "email"=>'boss@democompany.com',
            "physical_address"=>'123 Demo Street\r\nDemo Suburb\r\nDemo City\r\nDemo Province\r\nSouth Africa\r\n0001',
            "postal_address"=>'123 Demo Street\r\nDemo Suburb\r\nDemo City\r\nDemo Province\r\nSouth Africa\r\n0001',
            "domain"=>'democompany.com',
            "url_contact_us"=>'democompany.com/contact-us',
            "url_terms_and_conditions"=>'democompany.com/terms-and-conditions',
            "url_privacy_policy"=>'democompany.com/privacy-policy',
            "slogan"=>'Where everything just works',
            "document_logo"=>NULL,
            "website_logo"=>NULL,
            "created_at"=>'2021-06-06 12:50:56',
            "updated_at"=>'2021-06-07 08:57:34',
            "deleted_at"=> NULL
        ];
    }
}
