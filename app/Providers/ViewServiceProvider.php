<?php

namespace App\Providers;


use App\Views\View;
use Twig\Environment;
use App\Config\Config;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;

class ViewServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
	public function boot(): void
	{
		// 
	}

	public function register(): void
	{
		$this->getContainer()->add(View::class, function() {
			$loader = new FilesystemLoader(__DIR__ . '/../../resources/views');
			$debug = $this->getContainer()->get(Config::class)->get('app.debug');
			$twig = new Environment($loader, [
				'cache' => false,
				'debug' => $debug,
			]);

			// if ($debug) {
				$twig->addExtension(new DebugExtension());
			// }
			
			return new View($twig);
		});
	}

    public function provides(string $id): bool
	{
		$services = [
			View::class
		];

		return in_array($id, $services);
	}
}
