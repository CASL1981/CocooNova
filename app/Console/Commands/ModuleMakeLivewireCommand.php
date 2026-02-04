<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Nwidart\Modules\Facades\Module;

class ModuleMakeLivewireCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-livewire {name} {module} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Livewire component for a module';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $moduleName = $this->argument('module');
        $force = $this->option('force');

        // Validar que el módulo exista
        $module = Module::find($moduleName);
        
        if (!$module) {
            $this->error("Module {$moduleName} does not exist!");
            return 1;
        }

        $className = Str::studly($name);
        $kebabName = Str::kebab($name);
        $moduleLower = strtolower($moduleName);

        // Paths corregidos con barra correcta
        $modulePath = $module->getPath();
        $classPath = $modulePath . '/App/Livewire/' . $className . '.php';
        $viewPath = $modulePath . '/resources/views/livewire/' . $kebabName . '.blade.php';

        // Verificar si ya existe
        if (file_exists($classPath) && !$force) {
            $this->error("Component {$className} already exists!");
            $this->info("Use --force to overwrite.");
            return 1;
        }

        // Crear directorios si no existen
        $this->ensureDirectoryExists(dirname($classPath));
        $this->ensureDirectoryExists(dirname($viewPath));

        // Crear clase Livewire
        $this->createLivewireClass($classPath, $className, $moduleName, $moduleLower, $kebabName);
        
        // Crear vista
        $this->createLivewireView($viewPath, $kebabName, $className);

        $this->info("✅ Livewire component created successfully!");
        $this->line("");
        $this->line("📁 Class: Modules/{$moduleName}/App/Livewire/{$className}.php");
        $this->line("📁 View: Modules/{$moduleName}/resources/views/livewire/{$kebabName}.blade.php");
        $this->line("");
        $this->line("📝 Register in {$moduleName}ServiceProvider::register():");
        $this->warn("   Livewire::component('{$moduleLower}.{$kebabName}', {$className}::class);");
        $this->line("");
        $this->line("🎨 Use in Blade:");
        $this->warn("   <livewire:{$moduleLower}.{$kebabName} />");

        return 0;
    }

    private function ensureDirectoryExists($path)
    {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }

    private function createLivewireClass($path, $className, $moduleName, $moduleLower, $kebabName): void
    {
        $template = "<?php

        namespace Modules\\{$moduleName}\\App\\Livewire;

        use Livewire\\Component;

        class {$className} extends Component
        {
            public function render()
            {
                return view('{$moduleLower}::livewire.{$kebabName}');
            }
        }
        ";

        file_put_contents($path, $template);
    }

    private function createLivewireView($path, $kebabName, $className)
    {
        $title = Str::title(str_replace('-', ' ', $kebabName));

        $template = 
        "<div class=\"row\">
            <div class=\"col-12\">
                <div class=\"card\">
                    <div class=\"card-body\">
                        <h2>{$title}</h2>
                        <p>Componente Livewire '{$className}' funcionando ✅</p>
                    </div>
                </div>
            </div>
        </div>
        ";

        file_put_contents($path, $template);
    }
}
