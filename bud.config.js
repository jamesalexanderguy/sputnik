/**
 * Compiler configuration
 *
 * @type {import('@roots/bud').Config}
 */
export default async (app) => {
  app
    .entry('app', ['@scripts/app', '@styles/app'])
    .entry('editor', ['@scripts/editor', '@styles/editor'])
    .assets(['images']);

  app.setPublicPath('/app/themes/sage/public/');

  app
    .setUrl('http://localhost:3000')
    .setProxyUrl('http://cleanstart.test')
    .watch(['resources/views', 'app']);
    

  // pull Tailwind breakpoints (fall back to common defaults if not present)
  const screens =
    app.tailwind.resolveThemeValue('screens') ?? {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    };

  app.wpjson
    .setSettings({
      // this is the magic switch that enables padding/margin/typography controls
      appearanceTools: true,

      background: {
        backgroundImage: true,
      },

      color: {
        custom: false,
        customDuotone: false,
        customGradient: false,
        defaultDuotone: false,
        defaultGradients: false,
        defaultPalette: false,
        duotone: [],
      },

      // keep your existing custom buckets and add breakpoints mapped to Tailwind
      custom: {
        spacing: {},
        typography: {
          'font-size': {},
          'line-height': {},
        },
        breakpoints: {
          mobile: '0px',
          tablet: screens.md,   // maps Gutenberg "tablet" to Tailwind md
          desktop: screens.lg,  // maps Gutenberg "desktop" to Tailwind lg
          xl: screens.xl,
        },
      },

      // enable the UI controls Gutenberg needs for responsive spacing
      spacing: {
        customPadding: true,
        customMargin: true,
        units: ['px', '%', 'em', 'rem', 'vw', 'vh'],
      },

      // enable responsive font-size controls
      typography: {
        customFontSize: true,
        fluid: true,
      },
    })
    .useTailwindColors('extend')
    .useTailwindFontFamily('extend')
    .useTailwindFontSize('extend');
};
