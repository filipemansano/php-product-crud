<?php

namespace Tests\Unit\Product;

use App\Http\Requests\ProductFormRequest;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductFormRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Http\Requests\SaveProductRequest */
    private $rules;

    /** @var \Illuminate\Validation\Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();

        $this->validator = app()->get('validator');

        $this->rules = (new ProductFormRequest())->rules();

        // remove exists rule
        foreach($this->rules['category_id'] as $k => $rule){
            if(strpos($rule, 'exists') !== false){
                unset($this->rules['category_id'][$k]);
            }
        }
    }

    public function validationProvider()
    {
        /* WithFaker trait doesn't work in the dataProvider */
        $faker = Factory::create(Factory::DEFAULT_LOCALE);

        return [
            'request_should_fail_when_no_name_is_provided' => [
                'passed' => false,
                'data' => []
            ],
            'request_should_fail_when_name_is_bigger' => [
                'passed' => false,
                'data' => [
                    'name' => $faker->words(500)
                ]
            ],
            'request_should_fail_when_no_quantity_is_provided' => [
                'passed' => false,
                'data' => [
                    'name' => $faker->words(3)
                ]
            ],
            'request_should_fail_when_quantity_is_negative' => [
                'passed' => false,
                'data' => [
                    'quantity' => -1
                ]
            ],
            'request_should_fail_when_quantity_is_text' => [
                'passed' => false,
                'data' => [
                    'quantity' => 'abc'
                ]
            ],
            'request_should_fail_when_no_category_provided' => [
                'passed' => false,
                'data' => [
                    'quantity' => 2
                ]
            ],
            'request_should_fail_when_no_category_exists' => [
                'passed' => false,
                'data' => [
                    'category_id' => -1
                ]
            ],
            'request_should_success_when_body_is_correct' => [
                'passed' => true,
                'data' => [
                    'category_id' => 1,
                    'name' => 'test',
                    'quantity' => 2
                ]
            ]
        ];
    }

    /**
     * @test
     * @dataProvider validationProvider
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function validation_results_as_expected($shouldPass, $mockedRequestData)
    {
        $validate = $this->validator->make($mockedRequestData, $this->rules);

        $this->assertEquals(
            $shouldPass,
            $validate->passes(),
            $validate->errors()
        );
    }
}
