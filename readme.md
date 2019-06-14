# Gerenciagram Laravel Boilerplate
## Base do Projeto
* Laravel Lumen (laravel/lumen-framework": 5.8.*)
* Laravel Modules (nwidart/laravel-modules: ^5.0)
* Laravel Tinker (vluzrmos/tinker: ^1.4)

## Para criar um novo modulo
* php artisan module:make NomeDoModulo

### Dentro do NomeDoModuloServiceProvider.php
* Remover do boot() $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
* Importar Illuminate\Support\Facades\Config; (Caso mantenha registerViews())
* Trocar \Config por Config no metodo registerViews() (Caso mantenha registerViews())
* Remover do boot() $this->registerViews();

## Dentro do Module/NomeDoModule/RouteServiceProvider.php
* Trocar o import de use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider; para use Illuminate\Support\ServiceProvider;
* Remover public function boot()
* Trocar nome de map() para register()
* Remover $this->mapWebRoutes();
* Atualizar formato de Route para aceito pelo Lumen (Primeiro parâmetro: um vetor com prefix, middleware etc; Segundo parâmetro: Apontar apra o arquivo de rotar Routes/api.php)

```php
protected function mapApiRoutes()
    {
        $this->app->router->group(
            [
                'prefix' => 'api',
                'namespace' => $this->moduleNamespace,
                // 'middleware' => 'api'
            ],
            function ($app) {
                require __DIR__ . '/../Routes/api.php';
            }
        );
    }
```

## Dentro do Controller
* Alterar o import de Illuminate\Routing\Controller; para App\Http\Controllers\Controller;

## Remoções de arquivos e pastas não utilizadas
* Remover Pasta Resource
* Remover arquivo Routes/web.php
* Remover Pasta Database
* Remover Pasta Entities
