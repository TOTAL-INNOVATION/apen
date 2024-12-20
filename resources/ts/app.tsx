import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import React from 'react';

//@ts-ignore
const appName = import.meta.env.VITE_APP_NAME || 'Apen';

createInertiaApp({
  title: title => `${title} - ${appName}`,
  resolve: name =>
    resolvePageComponent(
      `./pages/${name}.tsx`,
	  //@ts-ignore
      import.meta.glob('./pages/**/*.tsx')
    ),
  setup({ el, App, props }) {
    const root = createRoot(el);
    root.render(<App {...props} />);
  },
  progress: {
    color: '#eb9120'
  }
});
