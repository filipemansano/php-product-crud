<?php

namespace Tests\Unit;

use App\Http\Requests\CategoryFormRequest;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryFormRequestTest extends TestCase
{
    use RefreshDatabase;

    /** @var \App\Http\Requests\SaveCategoryRequest */
    private $rules;

    /** @var \Illuminate\Validation\Validator */
    private $validator;

    public function setUp(): void
    {
        parent::setUp();

        $this->validator = app()->get('validator');

        $this->rules = (new CategoryFormRequest())->rules();
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
            'request_should_success_when_body_is_correct' => [
                'passed' => true,
                'data' => [
                    'name' => 'test',
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
