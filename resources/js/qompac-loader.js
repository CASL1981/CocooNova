// resources/js/qompac-loader.js
import _ from 'lodash';
import $ from 'jquery';

// 1. Exponer variables globales esenciales
window._ = _;
window.$ = $;
window.jQuery = $;

// 2. Importar dependencias del Scrollbar si es necesario
// Si la plantilla incluye 'smooth-scrollbar' en vendor, impórtalo aquí.
// Si no, intenta instalarlo: npm install smooth-scrollbar
import Scrollbar from 'smooth-scrollbar';
window.Scrollbar = Scrollbar;

// 3. AHORA importa los scripts de la plantilla en orden
import '../assets/js/core/libs.min.js';

// Pequeño hack: A veces external.min.js necesita un objeto vacío si la librería no está
if (typeof window.Scrollbar === 'undefined') {
    window.Scrollbar = class { static init() {} static initAll() {} };
}

import '../assets/js/iqonic-script/utility.min.js';
import '../assets/js/iqonic-script/setting.min.js';
import '../assets/js/setting-init.js';
import '../assets/js/qompac-ui.js';
import '../assets/js/sidebar.js';



// import _ from 'lodash';
// window._ = _;
// window.lodash = _;

// // Importar jQuery si la plantilla lo necesita (muchas de estas plantillas lo requieren)
// // Si no tienes jquery instalado: npm install jquery
// import $ from 'jquery';
// window.$ = $;
// window.jQuery = $;

// // Importar librerías core que definen objetos globales
// // NOTA: El orden es CRÍTICO.

// // 1. Libs (Suele contener Bootstrap, Popper, etc.)
// import '../assets/js/core/libs.min.js';

// // 2. Plugins externos
// import '../assets/js/core/external.min.js';

// // 3. Utilidades de IQonic (IQUtils)
// // Al importar este archivo, si define window.IQUtils internamente, funcionará.
// // Si no, necesitamos ver cómo lo exporta. Por lo general estas plantillas asignan a window directamente.
// import '../assets/js/iqonic-script/utility.min.js';

// // 4. Configuración (IQSetting)
// import '../assets/js/iqonic-script/setting.min.js';

// // 5. Inicialización de configuración
// import '../assets/js/setting-init.js';

// // 6. Scripts de la UI
// import '../assets/js/qompac-ui.js';
// import '../assets/js/sidebar.js';

// // 7. Gráficos (Dashboard) - Solo si estás en el dashboard
// // Puedes importar esto condicionalmente en la vista blade si prefieres
// import '../assets/js/charts/widgetcharts.js';
// import '../assets/js/charts/dashboard.js';
