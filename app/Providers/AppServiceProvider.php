<?php

namespace App\Providers;


use App\Config\Config;
use Spatie\Ignition\Ignition;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
	public function boot(): void
	{
		if ($this->getContainer()->get(Config::class)->get('app.debug')) {
			Ignition::make()->register();
		}
	}

	public function register(): void
	{
		// 
	}

    public function provides(string $id): bool
	{
		$services = [
			// 
		];

		return in_array($id, $services);
	}
}
