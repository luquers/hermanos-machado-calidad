<?php

namespace Tests;

use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $baseRoute = null;
    protected $baseModel = null;

    protected function signIn($user = null) {
        $user = $user ?? create(User::class);
        $this->actingAs($user);

        return $this;
    }

    protected function setBaseRoute($route) {
        $this->baseRoute = $route;
    }

    protected function setBaseModel($model) {
        $this->baseModel = $model;
    }

    protected function create($attributes = [], $model = '', $route = '') {
        $this->withoutExceptionHandling();

        $route = $this->baseRoute ? "{$this->baseRoute}.store" : $route;
        $model = $this->baseModel ?? $model;

        $attributes = raw($model, $attributes);

        if (!auth()->user()) {
            $this->expectException(AuthenticationException::class);
        }

        $response = $this->postJson(route($route), $attributes)->assertSuccessful();

        $model = new $model;

        $this->assertDatabaseHas($model->getTable(), $attributes);

//        $response = $this->patchJson(route($route, $model->id), $model->toArray());
//
//        tap($model->fresh, function($model) use ($attributes) {
//           collect($attributes)->each(function($value, $key) use ($model) {
//               $this->assertEquals($value, $model[$key]);
//           });
//        });

        return $response;
    }
}
