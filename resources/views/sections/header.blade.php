<header id="header" class="banner z-30 sticky top-0 transition duration-300 ease-in-out">
  <!--<a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a>-->

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif

  
<div id="navLayer" class="bg-secondary inset-0 z-10 h-screen w-screen origin-bottom scale-y-100 transition duration-500 group-data-[state=active]:origin-top group-data-[state=active]:scale-y-100 lg:hidden fixed"></div>
<nav id="shortHead" class="w-full z-10 relative">
        <div class="max-w-7xl mx-auto px-0 lg:px-12 xl:px-6">
            <div class="flex flex-wrap items-center justify-between py-2 gap-6 md:py-4 md:gap-0 relative">
                <div class="relative z-20 w-full flex justify-between lg:w-max md:px-0">
                    <a href="#home" aria-label="logo" class="flex space-x-2 items-center">
                      <div aria-hidden="true" class="flex space-x-1">
                        <div class="lg:w-1/4 xl:w-1/5 pr-6 lg:pr-8">
                          <div class="flex items-center">
                            <a class="block lg:mr-4" href="/">
                              <img class="max-w-sm w-auto h-10 mx-2" src="/wp-content/themes/sputnik/resources/images/SpaceRace-Logo-2025-colour.svg" alt="SpaceRace Logo">
                            </a>
                          </div>
                        </div>
                      </div>
                    </a>
                    
                    <div class="relative flex items-center lg:hidden max-h-10">
                        <label role="button" for="toggle_nav" aria-label="hamburger" id="hamburger" class="relative p-6">
                            <div aria-hidden="true" id="line" class="m-auto h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300"></div>
                            <div aria-hidden="true" id="line2" class="m-auto mt-2 h-0.5 w-5 rounded bg-sky-900 dark:bg-gray-300 transition duration-300"></div>
                        </label>
                    </div>
                </div>
                <div id="navMenu" class="flex-col z-20 flex-wrap gap-6 p-8 rounded-bl-3xl bg-white shadow-2xl shadow-gray-600/10 justify-end w-auto invisible opacity-0 absolute top-full right-0 transition-all duration-300 origin-top 
                            lg:relative lg:scale-100 lg:flex lg:flex-row lg:items-center lg:gap-0 lg:p-0 lg:bg-transparent lg:w-7/12 lg:visible lg:opacity-100 lg:border-none lg:shadow-none">
                   
                    <div class="text-gray-600 dark:text-gray-300 lg:pr-4 lg:w-auto w-full lg:pt-0">
                        <ul class="tracking-wide font-medium lg:text-sm flex-col flex lg:flex-row gap-6 lg:gap-0">
                            <li>
                                <a href="#features" class="block md:px-4 transition hover:text-primary">
                                    <span>Features</span>
                                </a>
                            </li>
                            <li>
                                <a href="#solution" class="block md:px-4 transition hover:text-primary">
                                    <span>Process</span>
                                </a>
                            </li>
                            <li>
                                <a href="#portfolio" class="block md:px-4 transition hover:text-primary">
                                    <span>Portfolio</span>
                                </a>
                            </li>
                            <li>
                                <a href="#blog" class="block md:px-4 transition hover:text-primary">
                                    <span>FAQ</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-12 lg:mt-0">
                        <a
                            href="#get-started"
                            class="relative flex h-9 w-full items-center justify-center px-4 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                            >
                            <span class="relative text-sm font-semibold text-white"
                                >Make Contact</span
                            >
                        </a>
                    </div>
                </div>
            </div>
</div>
    </nav>
</header>
